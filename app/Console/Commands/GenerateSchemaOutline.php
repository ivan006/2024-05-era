<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateSchemaOutline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:schema-outline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a text outline of the database schema';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get all table names from the database
        $tables = DB::select('SHOW TABLES');
        $tableKey = 'Tables_in_' . env('DB_DATABASE');

        // Open a file to write the schema outline
        $filePath = storage_path('schema_outline1.txt');
        $file = fopen($filePath, 'w');

        foreach ($tables as $table) {
            $tableName = $table->$tableKey;

            // Write the table name
            fwrite($file, "# $tableName\n");

            // Get columns for the table
            $columns = DB::select("SHOW COLUMNS FROM $tableName");

            foreach ($columns as $column) {
                $columnName = $column->Field;
                $columnType = $column->Type;

                // Write the column name and type
                fwrite($file, "- $columnName ($columnType)\n");
            }

            // Add a new line after each table
            fwrite($file, "\n");
        }

        fclose($file);

        $this->info("Schema outline has been generated at: $filePath");
    }
}
