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
        Schema::create('ruleactiondata', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Rule')->nullable();
            $table->string('TableName', 100)->nullable();
            $table->string('ColumnName', 100)->nullable();
            $table->string('ColumnType', 100)->nullable()->comment('INT, DATE, VARCHAR, DECIMAL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruleactiondata');
    }
};
