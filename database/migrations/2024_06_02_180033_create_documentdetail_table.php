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
        Schema::create('documentdetail', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Document')->nullable()->index('fk__document');
            $table->integer('Section')->nullable();
            $table->integer('Position')->nullable();
            $table->string('Title', 100)->nullable();
            $table->string('Description', 10000)->nullable();
            $table->json('Comments')->nullable();
            $table->integer('Style')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->timestamp('CreatedOn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentdetail');
    }
};
