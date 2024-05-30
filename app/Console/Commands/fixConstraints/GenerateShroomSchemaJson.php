<?php

namespace App\Console\Commands\fixConstraints;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GenerateShroomSchemaJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:shroom-schema-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the database schema as a JSON object with the word shroom in the title';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');
        $schema = [];

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_{$database}"};
            $columns = DB::select("SHOW COLUMNS FROM {$tableName}");
            $foreignKeys = $this->getForeignKeys($tableName);

            foreach ($columns as $column) {
                $field = [
                    'type' => $column->Type,
                ];

                if (isset($foreignKeys[$column->Field])) {
                    $field['parent'] = $foreignKeys[$column->Field];
                }

                $schema[$tableName]['fields'][$column->Field] = $field;
            }
        }

        $timestamp = date('Y_m_d_His');
        $outputFilePath = storage_path("shroom_schema_{$timestamp}.json");
        File::put($outputFilePath, json_encode($schema, JSON_PRETTY_PRINT));
        $this->info("Shroom schema JSON has been written to: $outputFilePath");
    }

    /**
     * Get the foreign keys for a table.
     *
     * @param string $table
     * @return array
     */
    protected function getForeignKeys(string $table): array
    {
        $foreignKeys = [];
        $results = DB::select("
            SELECT
                k.COLUMN_NAME,
                k.REFERENCED_TABLE_NAME
            FROM
                information_schema.KEY_COLUMN_USAGE k
            WHERE
                k.TABLE_SCHEMA = DATABASE() AND
                k.TABLE_NAME = ? AND
                k.REFERENCED_TABLE_NAME IS NOT NULL;
        ", [$table]);

        foreach ($results as $result) {
            $foreignKeys[$result->COLUMN_NAME] = $result->REFERENCED_TABLE_NAME;
        }

        return $foreignKeys;
    }
}
