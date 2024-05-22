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
            $relations = $this->getModelRelations($modelName);
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

    protected function getModelRelations($modelName)
    {
        $modelPath = app_path("Models/{$modelName}.php");

        if (!File::exists($modelPath)) {
            return ['relations' => [], 'imports' => []];
        }

        $fileContent = File::get($modelPath);
        $relations = [];
        $imports = [];

        preg_match_all('/public function (\w+)\(\)\s*{\s*return \$this->(\w+)\(([^)]+)\)/', $fileContent, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $relationName = $match[1];
            $relationType = $match[2];
            $relationDetails = $this->extractRelationDetails($match[3]);

            if ($relationDetails['relatedModel'] && !in_array($relationDetails['relatedModel'], $imports)) {
                $imports[] = $relationDetails['relatedModel'];
            }

            switch ($relationType) {
                case 'belongsTo':
                    $relations[] = "'$relationName': this.belongsTo($relationDetails[relatedModel], '$relationDetails[foreignKey]')";
                    break;
                case 'hasMany':
                    $relations[] = "'$relationName': this.hasMany($relationDetails[relatedModel])";
                    break;
                case 'hasOne':
                    $relations[] = "'$relationName': this.hasOne($relationDetails[relatedModel])";
                    break;
                case 'belongsToMany':
                    $relations[] = "'$relationName': this.belongsToMany($relationDetails[relatedModel], '$relationDetails[pivotTable]', '$relationDetails[foreignKey]', '$relationDetails[relatedForeignKey]')";
                    break;
            }
        }

        return ['relations' => $relations, 'imports' => $imports];
    }

    protected function extractRelationDetails($relationString)
    {
        preg_match('/\'App\\\\Models\\\\(\w+)\'/', $relationString, $modelMatch);
        preg_match('/foreignKey: \'(\w+)\'/', $relationString, $foreignKeyMatch);
        preg_match('/relatedPivotKey: \'(\w+)\'/', $relationString, $relatedForeignKeyMatch);

        return [
            'relatedModel' => $modelMatch ? $modelMatch[1] : null,
            'foreignKey' => $foreignKeyMatch ? $foreignKeyMatch[1] : null,
            'relatedForeignKey' => $relatedForeignKeyMatch ? $relatedForeignKeyMatch[1] : null
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
