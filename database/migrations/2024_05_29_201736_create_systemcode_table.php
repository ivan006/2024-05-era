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
        Schema::create('systemcode', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Context', 45)->nullable();
            $table->string('Field', 45)->nullable();
            $table->string('Description', 150)->nullable();
            $table->string('Value', 500);
            $table->string('Code', 45)->nullable();
            $table->boolean('Active')->nullable()->default(true);
            $table->boolean('UserGenerated')->default(false);
            $table->integer('ContextualId')->nullable();
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();
            $table->integer('Entity')->nullable()->index('fk_systemcode_entity');

            $table->unique(['Context', 'Field', 'ContextualId'], 'index 4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systemcode');
    }
};
