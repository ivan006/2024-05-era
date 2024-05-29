<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GenerateShroomForeignKeyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:shroom-foreign-key-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a report for missing foreign key constraints with the word shroom in the title';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Define the inferred foreign key relationships
        $foreignKeys = [
            'address' => ['Person' => 'systemuser'],
            'attachment' => ['RelativeID' => 'relative'],
            'audit' => ['Entity' => 'entity'],
            'bank' => ['Entity' => 'entity'],
            'communication' => ['RelativeID' => 'relative'],
            'contactnumber' => ['Person' => 'systemuser'],
            'crm' => [
                'Entity' => 'entity',
                'EntityProduct' => 'entity'
            ],
            'document' => [
                'RelativeID' => 'relative',
                'CreatedBy' => 'systemuser'
            ],
            'documentdetail' => ['CreatedBy' => 'systemuser'],
            'email' => ['Person' => 'systemuser'],
            'entityaudit' => ['Entity Id' => 'entity'],
            'entityevent' => [
                'TableID' => 'entity',
                'Instance' => 'entity'
            ],
            'entitygood' => ['WasteClass' => 'requirement'],
            'entitygoodapproval' => ['Period' => 'entitygood'],
            'entityrelationship' => [
                'EntityA' => 'entity',
                'EntityB' => 'entity'
            ],
            'object' => ['Parent' => 'object'],
            'objecttrait' => ['Object' => 'object'],
            'objectvalue' => [
                'Trait' => 'objecttrait',
                'Instance' => 'entityevent',
                'Object' => 'object',
                'Entity' => 'entity'
            ],
            'passwordhash' => ['SystemUser' => 'systemuser'],
            //'post_tags' => [
            //    'post_id' => 'posts',
            //    'tag_id' => 'tags'
            //],
            'productprovider' => ['Entity' => 'entity'],
            'query' => [
                'ParentQuery' => 'query',
                'CreatedBy' => 'systemuser',
                'ClosedBy' => 'systemuser'
            ],
            'queryheader' => [
                'RelativeID' => 'relative',
                'CreatedBy' => 'systemuser',
                'ClosedBy' => 'systemuser'
            ],
            'relative' => [
                'Entity' => 'entity',
                'Relative' => 'entity'
            ],
            'requirementdetail' => [
                'Requirement' => 'requirement',
                'RelativeID' => 'relative',
                'ChangedBy' => 'systemuser'
            ],
            'ruleaction' => ['Rule' => 'rule'],
            'ruleactiondata' => ['Rule' => 'rule'],
            'ruleconfig' => ['Rule' => 'rule'],
            'ruleentityrole' => [
                'Entity' => 'entity',
                'Rule' => 'rule'
            ],
            'systemuser' => ['Entity' => 'entity'],
            'transactions' => [
                'Entity' => 'entity',
                'EntityProduct' => 'entity'
            ],
            'useraccess' => ['Entity' => 'entity'],
            'userrole' => ['FbId' => 'systemuser'],
            'userroleaccess' => [
                'UserRole' => 'userrole',
                'SystemAction' => 'systemaction',
                'FbId' => 'systemuser',
                'Rule' => 'rule'
            ],
            'website_producer_registrations' => ['ProducerId' => 'entity']
        ];

        $timestamp = date('Y_m_d_His');
        $outputFilePath = storage_path("shroom_foreign_key_report_{$timestamp}.txt");
        $outputContent = '';

        foreach ($foreignKeys as $table => $keys) {
            $faultyColumns = [];
            foreach ($keys as $column => $referencedTable) {
                $referencedColumn = $this->getAutoIncrementColumn($referencedTable);
                $orphanedRecords = DB::table($table)
                    ->whereNotIn($column, function ($query) use ($referencedTable, $referencedColumn) {
                        $query->select($referencedColumn)->from($referencedTable);
                    })
                    ->get();

                if ($orphanedRecords->count() > 0) {
                    $faultyColumns[] = $column;
                }
            }

            if (!empty($faultyColumns)) {
                $outputContent .= "- $table (" . implode(', ', $faultyColumns) . ")\n";
            }
        }

        File::put($outputFilePath, $outputContent);
        $this->info("Shroom foreign key report has been written to: $outputFilePath");
    }

    /**
     * Get the auto-increment column for a table.
     *
     * @param string $table
     * @return string
     */
    protected function getAutoIncrementColumn(string $table): string
    {
        $columns = DB::select("SHOW COLUMNS FROM {$table}");
        foreach ($columns as $column) {
            if ($column->Extra === 'auto_increment') {
                return $column->Field;
            }
        }
        return 'id'; // Default to 'id' if no auto-increment column is found
    }
}
