<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GenerateVuexOrmModels extends Command
{
    protected $signature = 'generate:vuex-orm-models';
    protected $description = 'Generate Vuex ORM models from database schema';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            // Extract the table name dynamically
            $tableArray = get_object_vars($table);
            $tableName = reset($tableArray);
            $modelName = Str::studly(Str::singular($tableName));
            $jsModelName = Str::camel(Str::singular($tableName));
            $pluralTableName = Str::plural($tableName);

            $columns = DB::select("SHOW COLUMNS FROM $tableName");
            $primaryKey = $this->getPrimaryKey($columns);

            $fields = [];
            $fieldsMetadata = [];
            $relations = $this->getModelRelations($tableName);
            $imports = $this->generateImports($modelName, $relations['imports']);
            $parentWithables = [];
            $existingNames = [];

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $fieldMeta = "{}";
                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    $relatedFieldName = Str::camel(Str::singular($fieldName));
                    $parentWithables[] = "'$relatedFieldName'";
                    $fieldMeta = "{ relationRules: { linkables: (user) => { return {} } } }";
                }
                $fields[] = "'$fieldName': this.attr('')";
                $fieldsMetadata[] = "'$fieldName': $fieldMeta"; // Placeholder for actual metadata logic
            }

            // Adjust relationship names, applying the unique name mechanism only to hasMany relationships
            $uniqueRelations = $this->adjustRelationNames($relations['relations'], $existingNames);

            $fieldsString = implode(",\n            ", $fields);
            $fieldsMetadataString = implode(",\n            ", $fieldsMetadata);
            $relationsString = implode(",\n            ", array_map(fn($rel) => "'{$rel['name']}': {$rel['definition']}", $uniqueRelations));
            $parentWithablesString = implode(",\n        ", $parentWithables);

            $jsModel = <<<EOT
$imports

export default class $modelName extends MyBaseModel {
    static entity = '$jsModelName';
    static entityUrl = '/api/$pluralTableName';
    static primaryKey = '$primaryKey';

    static parentWithables = [
        $parentWithablesString
    ];

    static rules = {
        readables: (user) => true,
        readable: (user, item) => true,
        editable: (user, item) => true,
    };

    static fieldsMetadata = {
        $fieldsMetadataString
    };

    static fields() {
        return {
            $fieldsString,
            $relationsString
        };
    }

    static displayMapSummary = {
        // Define displayMapSummary
    };

    static displayMapFull = {
        // Define displayMapFull
    };

    static FetchAll(relationships = [], flags = {}, moreHeaders = {}, options = { page: 1, limit: 15, filters: {}, clearPrimaryModelOnly: false }) {
        return this.customSupabaseApiFetchAll(
            `\${this.baseUrl}\${this.entityUrl}`,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders),
            options
        );
    }

    static FetchById(id, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiFetchById(
            `\${this.baseUrl}\${this.entityUrl}?id=eq.\${id}`,
            id,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders)
        );
    }

    static Store(entity, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiStore(
            `\${this.baseUrl}\${this.entityUrl}`,
            entity,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders)
        );
    }

    static Update(entity, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiUpdate(
            `\${this.baseUrl}\${this.entityUrl}?id=eq.\${entity.id}`,
            entity,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders)
        );
    }

    static Delete(entityId, options = { flags: {}, moreHeaders: {} }) {
        return this.customSupabaseApiDelete(
            `\${this.baseUrl}\${this.entityUrl}?id=eq.\${entityId}`,
            entityId
        );
    }
}
EOT;

            $path = base_path("vuex-orm-models/{$modelName}.js");
            File::put($path, $jsModel);

            $this->info("Generated Vuex ORM model for $tableName");
        }
    }

    protected function getPrimaryKey($columns)
    {
        foreach ($columns as $column) {
            if ($column->Key === 'PRI') {
                return $column->Field;
            }
        }

        return 'id'; // Default primary key if none is found
    }

    protected function getModelRelations($tableName)
    {
        $foreignKeys = DB::select("SELECT
            COLUMN_NAME,
            REFERENCED_TABLE_NAME,
            REFERENCED_COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $relations = [];
        $imports = [];
        $foreignKeysArray = [];

        foreach ($foreignKeys as $foreignKey) {
            $relationFieldName = $foreignKey->COLUMN_NAME;
            $relatedModel = Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME));
            $relationName = Str::camel(Str::singular($foreignKey->COLUMN_NAME));

            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }

            $relationDefinition = "this.belongsTo($relatedModel, '$relationFieldName')";
            $relations[] = [
                'name' => $relationName,
                'definition' => $relationDefinition,
                'relatedModel' => $relatedModel,
                'fieldName' => $relationFieldName,
                'type' => 'belongsTo'
            ];
            $foreignKeysArray[] = ['COLUMN_NAME' => $foreignKey->COLUMN_NAME, 'RELATED_MODEL' => $relatedModel];
        }

        // Add hasMany relationships
        $childRelations = DB::select("SELECT
            TABLE_NAME,
            COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        foreach ($childRelations as $childRelation) {
            $relationName = Str::camel(Str::plural($childRelation->TABLE_NAME));
            $relatedModel = Str::studly(Str::singular($childRelation->TABLE_NAME));
            $relationDefinition = "this.hasMany($relatedModel, '{$childRelation->COLUMN_NAME}')";
            $relations[] = [
                'name' => $relationName,
                'definition' => $relationDefinition,
                'relatedModel' => $relatedModel,
                'fieldName' => $childRelation->COLUMN_NAME,
                'type' => 'hasMany'
            ];
            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }
        }

        return ['relations' => $relations, 'imports' => $imports, 'foreignKeys' => $foreignKeysArray];
    }

    protected function generateRelationshipName($relatedModel, $fieldName, &$existingNames)
    {
        $baseName = Str::camel(Str::singular($relatedModel) . Str::studly($fieldName));
        $name = $baseName;
        $counter = 1;
        while (in_array($name, $existingNames)) {
            $name = $baseName . $counter;
            $counter++;
        }
        return $name;
    }

    protected function adjustRelationNames($relations, &$existingNames)
    {
        $relationCount = [];
        foreach ($relations as $relation) {
            $key = $relation['relatedModel'];
            if (!isset($relationCount[$key])) {
                $relationCount[$key] = 0;
            }
            $relationCount[$key]++;
        }

        foreach ($relations as &$relation) {
            $key = $relation['relatedModel'];
            if ($relationCount[$key] > 1 && $relation['type'] === 'hasMany') {
                $relation['name'] = $this->generateRelationshipName($relation['relatedModel'], $relation['fieldName'], $existingNames);
            } else {
                $relation['name'] = Str::camel(Str::singular($relation['relatedModel']));
            }
            $existingNames[] = $relation['name'];
        }

        return $relations;
    }

    protected function generateFieldMetadata($fieldName)
    {
        // Generate field metadata based on field name or other criteria
        return "{}"; // Placeholder, should be replaced with actual metadata generation logic
    }

    protected function generateImports($modelName, $relatedModels)
    {
        $imports = array_map(function($relatedModel) {
            return "import $relatedModel from './$relatedModel';";
        }, $relatedModels);

        array_unshift($imports, "import MyBaseModel from '@/models/MyBaseModel';");
        return implode("\n", $imports);
    }
}
