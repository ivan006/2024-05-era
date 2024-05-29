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
        Schema::create('objecttrait', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Name', 250)->default('0');
            $table->string('Description', 250)->nullable();
            $table->integer('Object')->default(0);
            $table->string('Type', 50)->nullable()->comment('Integer, Varchar, etc');
            $table->string('Level', 50)->nullable();
            $table->tinyInteger('IsRule')->nullable()->default(0);
            $table->tinyInteger('SpecialType')->nullable()->default(0);
            $table->tinyInteger('IsDisabled')->nullable()->default(0);
            $table->tinyInteger('IsHidden')->nullable()->default(0);
            $table->string('SystemCodeContext', 50)->nullable();
            $table->string('SystemCodeField', 50)->nullable();

            $table->unique(['Object', 'Name'], 'index 2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objecttrait');
    }
};
