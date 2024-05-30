<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

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
            $map[$table] = [];

            foreach ($columns as $column) {
                // Only consider numeric types as potential foreign keys
                $type = Schema::getColumnType($table, $column);
                if (!in_array($type, ['integer', 'bigint', 'smallint', 'tinyint'])) {
                    continue;
                }

                $nullability = Schema::getConnection()->getDoctrineColumn($table, $column)->getNotnull() ? 'NOT NULL' : 'NULL';
                $relation = $this->getForeignKeyRelation($table, $column);
                $map[$table][$column] = "{$type} - {$nullability}" . ($relation ? " ({$relation})" : " ()");
            }
        }

        $json = json_encode($map, JSON_PRETTY_PRINT);
        Storage::put('erd_assumption_map.json', $json);

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
