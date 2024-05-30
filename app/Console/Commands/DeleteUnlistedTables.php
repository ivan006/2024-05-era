<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DeleteUnlistedTables extends Command
{
    protected $signature = 'tables:delete-unlisted';
    protected $description = 'Delete tables not in the specified list';

    protected $allowedTables = [
        'website_producer_registrations',
        'servicerequestreport',
        'treatmentdetails',
        'servicerequestfrequency',
        'servicerequest',
        'entity',
        'externalproducers',
        'productprovider',
        'transactions',
        'entityaudit',
        'audit',
        'entitygood',
        'good',
        'entitygoodapproval',
        'queryheader',
        'systemaction',
        'systemcode',
        'systemuser',
        'document',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tables = Schema::getAllTables();

        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0]; // Getting table name depending on the DB driver

            if (!in_array($tableName, $this->allowedTables)) {
                Schema::dropIfExists($tableName);
                $this->info("Deleted table: $tableName");
            }
        }

        $this->info('Completed deleting unlisted tables.');
    }
}
