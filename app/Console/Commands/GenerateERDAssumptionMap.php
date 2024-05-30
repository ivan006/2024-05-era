<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
                $type = Schema::getColumnType($table, $column);
                $nullability = Schema::getConnection()->getDoctrineColumn($table, $column)->getNotnull() ? 'NOT NULL' : 'NULL';

                $relation = $this->getForeignKeyRelation($table, $column);
                $map[$table][$column] = "{$type} - {$nullability}" . ($relation ? " ({$relation})" : " ()");
            }
        }

        $this->output->writeln(json_encode($map, JSON_PRETTY_PRINT));
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
