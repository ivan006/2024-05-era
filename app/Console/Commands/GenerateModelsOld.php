<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Krlove\EloquentModelGenerator\Generator;

class GenerateModelsOld extends Command
{
    protected $signature = 'generate:models';
    protected $description = 'Generate models from database tables';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_$database"};
            $modelName = \Str::studly(\Str::singular($tableName));
            $this->call('krlove:generate:model', [
                'class-name' => $modelName,
                '--table-name' => $tableName,
            ]);
        }

        $this->info('Models generated successfully.');
    }
}
