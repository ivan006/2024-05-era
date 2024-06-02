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
        Schema::create('systemaction', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Module', 45);
            $table->string('Context', 45);
            $table->string('Action', 45);
            $table->string('Description', 100)->nullable();
            $table->boolean('Available')->nullable();
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();

            $table->index(['Module', 'Context', 'Action'], 'index_mac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systemaction');
    }
};
