<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateIvanRD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:ivanrd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an IvanRD showing table relationships';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');
        $tableKey = "Tables_in_$database";
        $relationships = $this->getTableRelationships();

        $output = '';

        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            $output .= "\n# $tableName\n";
            if (isset($relationships[$tableName])) {
                foreach ($relationships[$tableName] as $childTable) {
                    $output .= "- $childTable\n";
                }
            }
        }

        $outputFilePath = storage_path("ivanrd.txt");
        file_put_contents($outputFilePath, $output);
        $this->info("IvanRD has been generated and saved to $outputFilePath");
    }

    /**
     * Get table relationships based on foreign keys.
     *
     * @return array
     */
    protected function getTableRelationships()
    {
        $relationships = [];

        // Get all foreign keys
        $foreignKeys = DB::select('
            SELECT
                TABLE_NAME,
                COLUMN_NAME,
                REFERENCED_TABLE_NAME,
                REFERENCED_COLUMN_NAME
            FROM
                INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE
                TABLE_SCHEMA = ? AND
                REFERENCED_TABLE_NAME IS NOT NULL
        ', [env('DB_DATABASE')]);

        foreach ($foreignKeys as $foreignKey) {
            $table = $foreignKey->TABLE_NAME;
            $referencedTable = $foreignKey->REFERENCED_TABLE_NAME;

            if (!isset($relationships[$referencedTable])) {
                $relationships[$referencedTable] = [];
            }

            $relationships[$referencedTable][] = $table;
        }

        return $relationships;
    }
}
