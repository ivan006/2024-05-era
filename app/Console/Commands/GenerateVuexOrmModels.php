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
            foreach ($columns as $column) {
                $fields[] = "'{$column->Field}': this.attr('')";
            }

            $fieldsString = implode(",\n            ", $fields);
            $relations = $this->getModelRelations($tableName);
            $imports = $this->generateImports($modelName, $relations['imports']);

            $relationsString = implode(",\n            ", $relations['relations']);

            $jsModel = <<<EOT
$imports

export default class $modelName extends Model {
    static entity = '$jsModelName';

    static fields() {
        return {
            id: this.attr(null),
            $fieldsString,
            $relationsString
        };
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

    protected function extractRelationDetails($relationString)
    {
        preg_match('/\'App\\\\Models\\\\(\w+)\'/', $relationString, $modelMatch);
        preg_match('/,\s*\'(\w+)\'/', $relationString, $foreignKeyMatch);
        preg_match('/relatedPivotKey:\s*\'(\w+)\'/', $relationString, $relatedForeignKeyMatch);
        preg_match('/pivotTable:\s*\'(\w+)\'/', $relationString, $pivotTableMatch);

        return [
            'relatedModel' => $modelMatch ? $modelMatch[1] : null,
            'foreignKey' => $foreignKeyMatch ? $foreignKeyMatch[1] : null,
            'relatedForeignKey' => $relatedForeignKeyMatch ? $relatedForeignKeyMatch[1] : null,
            'pivotTable' => $pivotTableMatch ? $pivotTableMatch[1] : null
        ];
    }

    protected function generateImports($modelName, $relatedModels)
    {
        $imports = array_map(function($relatedModel) {
            return "import $relatedModel from './$relatedModel';";
        }, $relatedModels);

        array_unshift($imports, "import { Model } from '@vuex-orm/core';");
        return implode("\n", $imports);
    }
}
?>
