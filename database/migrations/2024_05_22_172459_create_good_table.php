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
        Schema::create('good', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('HSCode', 50)->nullable();
            $table->string('Description', 1000)->nullable();
            $table->integer('EU6')->nullable();
            $table->integer('EU10')->nullable();
            $table->string('UNU', 10)->nullable();
            $table->decimal('AvgKg', 16, 6)->default(0);
            $table->integer('Category')->nullable();
            $table->integer('HazardSubstance')->nullable();
            $table->integer('Dimension')->nullable();
            $table->integer('Sector')->default(696)->index('fk1_sector');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good');
    }
};
