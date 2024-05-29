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
        Schema::create('rule', function (Blueprint $table) {
            $table->integer('Id', true)->comment('Rule number');
            $table->string('Name', 100)->nullable();
            $table->string('Description', 100)->nullable()->comment('Description of the rule');
            $table->string('RuleType', 100)->nullable()->comment('Is the rule a product rule; data rule, etc.');
            $table->integer('NextRule')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule');
    }
};
