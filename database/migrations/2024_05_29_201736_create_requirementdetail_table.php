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
        Schema::create('requirementdetail', function (Blueprint $table) {
            $table->integer('Id', true)->comment('AUTO_INCREMENT');
            $table->integer('Requirement')->nullable();
            $table->integer('RelativeID')->nullable();
            $table->string('Service', 50)->nullable();
            $table->string('Category', 50)->nullable();
            $table->string('Value', 100)->nullable();
            $table->string('Comment', 200)->nullable();
            $table->integer('Received')->nullable()->comment('1 or 0');
            $table->string('Name', 1000)->nullable();
            $table->string('NameOriginal', 1000)->nullable();
            $table->string('ContentType', 200)->nullable();
            $table->string('Path', 1000)->nullable();
            $table->integer('ChangedBy')->nullable();
            $table->dateTime('ChangedOn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementdetail');
    }
};
