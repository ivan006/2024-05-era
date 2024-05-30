<?php

namespace App\Console\Commands\fixConstraints;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ListEmptyTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:empty-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all empty tables in the database';

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

        $emptyTables = [];

        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            $count = DB::table($tableName)->count();

            if ($count == 0) {
                $emptyTables[] = $tableName;
            }
        }

        if (empty($emptyTables)) {
            $this->info('No empty tables found in the database.');
        } else {
            $this->info('Empty tables:');
            foreach ($emptyTables as $emptyTable) {
                $this->info($emptyTable);
            }
        }
    }
}
