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
        Schema::create('query', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ParentQuery')->index('fk_query_queryheader');
            $table->string('AssignedTo', 100)->nullable();
            $table->string('Description', 1000)->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->timestamp('CreatedOn')->nullable()->useCurrent();
            $table->timestamp('ClosedOn')->nullable();
            $table->integer('ClosedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query');
    }
};
