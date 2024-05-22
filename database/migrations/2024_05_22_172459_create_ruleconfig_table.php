<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ruleconfig', function (Blueprint $table) {
            $table->integer('Id', true)->comment('Rules can be applied to test a single record. To check the price to be applied to a policy based on the rules or to select a record or many records based on the rule. Data access rule. Which users have access to what rule. Or a group of users.');
            $table->integer('Rule')->nullable();
            $table->string('TableName', 100)->nullable();
            $table->string('ColumnName', 100)->nullable();
            $table->string('ColumnType', 100)->nullable()->comment('INT, DATE, VARCHAR, DECIMAL');
            $table->string('Operand', 100)->nullable()->comment('<, >, =, etc and include IN');
            $table->string('Value', 100)->nullable();
            $table->string('Description', 100)->nullable()->comment('Describe the sub rule and the action expected');
            $table->string('SystemCodeValue', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruleconfig');
    }
};
