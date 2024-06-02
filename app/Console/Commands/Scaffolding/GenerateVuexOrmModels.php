<?php

namespace App\Console\Commands\Scaffolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Console\Commands\WordSplitter;

class GenerateVuexOrmModels extends Command
{
    protected $signature = 'generate:vuex-orm-models';
    protected $description = 'Generate Vuex ORM models from database schema';
    protected $wordSplitter;

    public function __construct()
    {
        parent::__construct();
        $this->wordSplitter = new WordSplitter();
    }

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $routes = [];
        $models = [];

        foreach ($tables as $table) {
            // Extract the table name dynamically
            $tableArray = get_object_vars($table);
            $tableName = reset($tableArray);
            $cleanedTableName = preg_replace('/[^a-zA-Z]/', '', $tableName);
            $this->info("Processing table: $tableName (cleaned: $cleanedTableName)");

            $segmentationResult = $this->wordSplitter->split($cleanedTableName);
            $segmentedTableName = $segmentationResult['words'];
            $this->info("Segmented table name: " . implode(' ', $segmentedTableName));

            $pascalTableName = implode('', array_map('ucfirst', $segmentedTableName));
            $modelName = Str::singular($pascalTableName);
            $jsModelName = Str::camel(Str::singular($cleanedTableName));
            $pluralTableName = Str::plural(Str::kebab(implode('-', $segmentedTableName)));

            $columns = DB::select("SHOW COLUMNS FROM $tableName");
            $primaryKey = $this->getPrimaryKey($columns);

            $fields = [];
            $fieldsMetadata = [];
            $relations = $this->getModelRelations($tableName, $columns);
            $imports = $this->generateImports($modelName, $relations['imports']);
            $parentWithables = [];

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $fieldMeta = "{}";
                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    $relatedFieldName = $this->generateRelationName($fieldName, array_map(function ($column) { return strtolower($column->Field); }, $columns));
                    $parentWithables[] = "'$relatedFieldName'";
                    $fieldMeta = "{ relationRules: { linkables: (user) => { return {} } } }";
                }
                $fields[] = "'$fieldName': this.attr('')";
                $fieldsMetadata[] = "'$fieldName': $fieldMeta"; // Placeholder for actual metadata logic
            }

            $fieldsString = implode(",\n            ", $fields);
            $fieldsMetadataString = implode(",\n            ", $fieldsMetadata);
            $relationsString = implode(",\n            ", $relations['relations']);
            $parentWithablesString = implode(",\n        ", $parentWithables);

            $jsModel = <<<EOT
$imports

export default class $modelName extends MyBaseModel {
    static entity = '$jsModelName';
    static entityUrl = '/api/$pluralTableName';
    static primaryKey = '$primaryKey';
    static openRecord(pKey){
      router.push({
        name: '/lists/$pluralTableName/:rId',
        params: {
          rId: pKey,
        },
      })
    }

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
            options,
            this.adapator
        );
    }

    static FetchById(id, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiFetchById(
            `\${this.baseUrl}\${this.entityUrl}`,
            id,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders),
            this.adapator
        );
    }

    static Store(entity, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiStore(
            `\${this.baseUrl}\${this.entityUrl}`,
            entity,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders),
            this.adapator
        );
    }

    static Update(entity, relationships = [], flags = {}, moreHeaders = {}) {
        return this.customSupabaseApiUpdate(
            `\${this.baseUrl}\${this.entityUrl}`,
            entity,
            [...this.parentWithables, ...relationships],
            flags,
            this.mergeHeaders(moreHeaders),
            this.adapator
        );
    }

    static Delete(entityId, options = { flags: {}, moreHeaders: {} }) {
        return this.customSupabaseApiDelete(
            `\${this.baseUrl}\${this.entityUrl}`,
            entityId,
            this.adapator
        );
    }
}
EOT;

            $path = base_path("resources/js/models/{$modelName}.js");
            File::put($path, $jsModel);

            $this->info("Generated Vuex ORM model for $tableName");

            $models[] = [
                'modelName' => $modelName
            ];
        }

        $this->generateStoreFile($models);
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

    protected function getModelRelations($tableName, $columns)
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
        $existingFields = array_map(function ($column) {
            return strtolower($column->Field);
        }, $columns);

        foreach ($foreignKeys as $foreignKey) {
            $relationFieldName = $foreignKey->COLUMN_NAME;
            $relatedModel = Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME));
            $relationName = $this->generateRelationName($relationFieldName, $existingFields);

            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }

            $relations[] = "'$relationName': this.belongsTo($relatedModel, '$relationFieldName')";
            $foreignKeysArray[] = ['COLUMN_NAME' => $foreignKey->COLUMN_NAME, 'RELATED_MODEL' => $relatedModel];
        }

        // Add hasMany relationships
        $childRelations = DB::select("SELECT
            TABLE_NAME,
            COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        $childRelationNames = [];
        foreach ($childRelations as $childRelation) {
            $relationFieldName = $childRelation->COLUMN_NAME;
            $relationName = Str::camel(Str::plural($childRelation->TABLE_NAME));
            $relatedModel = Str::studly(Str::singular($childRelation->TABLE_NAME));

            // Check for conflicts in hasMany relation names
            if (isset($childRelationNames[$relationName])) {
                $relationName .= ucfirst(Str::camel($relationFieldName));
            } else if (in_array(strtolower($relationName), $existingFields)) {
                $relationName .= 'Rel';
            }
            $childRelationNames[$relationName] = true;

            $relations[] = "'$relationName': this.hasMany($relatedModel, '$relationFieldName')";
            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }
        }

        return ['relations' => $relations, 'imports' => $imports, 'foreignKeys' => $foreignKeysArray];
    }

    protected function generateRelationName($fieldName, $existingFields)
    {
        // Remove suffixes like _ID, _Id, _id, id, ID, Id
        $relationName = preg_replace('/(_ID|_Id|_id|id|ID|Id)$/', '', $fieldName);
        $relationName = Str::camel(Str::singular($relationName));

        // Check for conflicts
        if (in_array(strtolower($relationName), $existingFields)) {
            $relationName .= 'Rel';
        }

        return $relationName;
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

        $imports = [
            ...$imports,
            "import router from '@/router';"
        ];

        array_unshift(
            $imports,
            "import MyBaseModel from '@/models/MyBaseModel';",
        );
        return implode("\n", $imports);
    }

    protected function generateStoreFile($models)
    {
        $imports = array_map(function($model) {
            return "import {$model['modelName']} from '@/models/{$model['modelName']}';";
        }, $models);

        $registrations = array_map(function($model) {
            return "database.register({$model['modelName']});";
        }, $models);

        $importsString = implode("\n", $imports);
        $registrationsString = implode("\n", $registrations);

        $storeFileContent = <<<EOT
import { createStore } from 'vuex';
import VuexORM from '@vuex-orm/core';
import VuexORMAxios from '@vuex-orm/plugin-axios';
import axios from 'axios';

import { DBCrudCacheSet } from 'quicklists-vue-orm-ui';

$importsString

VuexORM.use(VuexORMAxios, {
  axios,
  baseURL: 'https://your-api-url.com'  // Set your API base URL here
});

const database = new VuexORM.Database();

database.register(DBCrudCacheSet);
$registrationsString

const store = createStore({
  plugins: [VuexORM.install(database)]
});

export default store;
EOT;

        $storeFilePath = base_path('resources/js/store/index.js');
        File::ensureDirectoryExists(dirname($storeFilePath));
        File::put($storeFilePath, $storeFileContent);

        $this->info('Generated store file');
    }

}
