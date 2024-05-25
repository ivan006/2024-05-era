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
        $database = env('DB_DATABASE');

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_$database"};
            $modelName = Str::studly(Str::singular($tableName));
            $jsModelName = Str::camel(Str::singular($tableName));

            $columns = DB::select("SHOW COLUMNS FROM $tableName");

            $fields = [];
            $fieldsMetadata = [];
            $relations = $this->getModelRelations($tableName);
            $imports = $this->generateImports($modelName, $relations['imports']);

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $fieldMeta = $this->generateFieldMetadata($fieldName);
                $fields[] = "'$fieldName': this.attr('', $fieldMeta)";
                $fieldsMetadata[] = "$fieldName: { usageType: '', linkable: true }"; // Example metadata
            }

            $fieldsString = implode(",\n            ", $fields);
            $fieldsMetadataString = implode(",\n            ", $fieldsMetadata);
            $relationsString = implode(",\n            ", $relations['relations']);

            $jsModel = <<<EOT
$imports

export default class $modelName extends MyBaseModel {
    static entity = '$jsModelName';
    static entityUrl = '/rest/v1/$tableName';

    static parentWithables = [
        // Add parent withables based on relations
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
            id: this.attr(null),
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

        foreach ($foreignKeys as $foreignKey) {
            $relationName = Str::camel(Str::singular($foreignKey->COLUMN_NAME));
            $relatedModel = Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME));

            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }

            $relations[] = "'$relationName': this.belongsTo($relatedModel, '{$foreignKey->COLUMN_NAME}')";
        }

        return ['relations' => $relations, 'imports' => $imports];
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
