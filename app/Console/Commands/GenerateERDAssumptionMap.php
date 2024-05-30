<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class GenerateERDAssumptionMap extends Command
{
    protected $signature = 'generate:erd-assumption-map';
    protected $description = 'Generate an ERD assumption map from the database schema';

    public function handle()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $map = [];

        foreach ($tables as $table) {
            $columns = Schema::getColumnListing($table);
            $primaryKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableDetails($table)->getPrimaryKey()->getColumns();
            $map[$table] = [];

            foreach ($columns as $column) {
                // Get column details
                $type = Schema::getColumnType($table, $column);
                $columnDetails = Schema::getConnection()->getDoctrineColumn($table, $column);

                // Skip primary keys and auto increment keys
                if (in_array($column, $primaryKeys) || $columnDetails->getAutoincrement()) {
                    continue;
                }

                $nullability = $columnDetails->getNotnull() ? 'NOT NULL' : 'NULL';
                $relation = $this->getForeignKeyRelation($table, $column);
                $map[$table][$column] = "ft: {$type}; n: {$nullability}; rel: " . ($relation ? $relation : '') . "; at: ;";
            }
        }

        $json = json_encode($map, JSON_PRETTY_PRINT);
        File::put(storage_path("erd_assumption_map.json"), $json);

        $this->info('ERD assumption map has been generated and saved to storage/erd_assumption_map.json');
    }

    private function getForeignKeyRelation($table, $column)
    {
        $foreignKeys = DB::connection()->getDoctrineSchemaManager()->listTableForeignKeys($table);

        foreach ($foreignKeys as $foreignKey) {
            if (in_array($column, $foreignKey->getLocalColumns())) {
                return $foreignKey->getForeignTableName();
            }
        }

        return null;
    }
}
