<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModelRelationHelper
{
    public function getModelRelations($tableName, $columns)
    {
        $foreignKeys = DB::select("SELECT
            COLUMN_NAME,
            REFERENCED_TABLE_NAME,
            REFERENCED_COLUMN_NAME,
            CONSTRAINT_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $hasManyRelations = DB::select("SELECT
            TABLE_NAME,
            COLUMN_NAME,
            REFERENCED_COLUMN_NAME,
            CONSTRAINT_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        $foreignKeysArray = [];
        $hasManyArray = [];

        foreach ($foreignKeys as $foreignKey) {
            $foreignKeysArray[] = [
                'COLUMN_NAME' => $foreignKey->COLUMN_NAME,
                'REFERENCED_TABLE_NAME' => $foreignKey->REFERENCED_TABLE_NAME,
                'REFERENCED_COLUMN_NAME' => $foreignKey->REFERENCED_COLUMN_NAME,
                'RELATED_MODEL' => Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME))
            ];
        }

        foreach ($hasManyRelations as $relation) {
            $hasManyArray[] = [
                'model' => Str::studly(Str::singular($relation->TABLE_NAME)),
                'name' => Str::camel(Str::plural($relation->TABLE_NAME)),
                'COLUMN_NAME' => $relation->COLUMN_NAME,
                'KEY_COLUMN_NAME' => $relation->REFERENCED_COLUMN_NAME,
                'RELATED_MODEL' => Str::studly(Str::singular($relation->TABLE_NAME))
            ];
        }

        return ['foreignKeys' => $foreignKeysArray, 'hasMany' => $hasManyArray];
    }

    public function getRelatedModelName($fieldName, $foreignKeys)
    {
        foreach ($foreignKeys as $foreignKey) {
            if ($foreignKey['COLUMN_NAME'] === $fieldName) {
                return $foreignKey['RELATED_MODEL'];
            }
        }
        return null;
    }

    public function groupHasManyRelations($hasManyRelations)
    {
        $groupedRelations = [];
        foreach ($hasManyRelations as $relation) {
            $groupedRelations[$relation['model']][] = $relation;
        }
        return $groupedRelations;
    }
}
