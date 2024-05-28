<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GenerateForeignKeyMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:foreign-key-migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate migrations for missing foreign key constraints';

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
            'post_tags' => [
                'post_id' => 'posts',
                'tag_id' => 'tags'
            ],
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

        foreach ($foreignKeys as $table => $keys) {
            $migrationName = "add_foreign_keys_to_{$table}_table";
            $filename = database_path("migrations/{$timestamp}_{$migrationName}.php");

            $content = $this->generateMigrationContent($table, $keys);

            File::put($filename, $content);
            $this->info("Created migration: $filename");
        }
    }

    /**
     * Generate the content for a migration file.
     *
     * @param string $table
     * @param array $keys
     * @return string
     */
    protected function generateMigrationContent(string $table, array $keys): string
    {
        $className = 'AddForeignKeysTo' . ucfirst($table) . 'Table';

        $foreignKeys = '';
        foreach ($keys as $column => $referencedTable) {
            $foreignKeys .= "\$table->foreign('{$column}')->references('id')->on('{$referencedTable}');\n            ";
        }

        return <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class {$className} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('{$table}', function (Blueprint \$table) {
            {$foreignKeys}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('{$table}', function (Blueprint \$table) {
            {$this->generateDropForeignKeys($keys)}
        });
    }
}
EOT;
    }

    /**
     * Generate the content for dropping foreign keys in a migration file.
     *
     * @param array $keys
     * @return string
     */
    protected function generateDropForeignKeys(array $keys): string
    {
        $dropForeignKeys = '';
        foreach ($keys as $column => $referencedTable) {
            $dropForeignKeys .= "\$table->dropForeign(['{$column}']);\n            ";
        }
        return $dropForeignKeys;
    }
}
