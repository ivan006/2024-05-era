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
        Schema::create('entitygood', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Entity')->index('fk_entitygood_entity');
            $table->integer('Good')->index('fk__good');
            $table->integer('Units')->default(0);
            $table->decimal('AvgKg', 16, 6)->default(0);
            $table->decimal('AvgKgOld', 16, 6)->nullable()->default(0);
            $table->decimal('AvgLifeSpan', 16, 6)->nullable()->default(0);
            $table->decimal('TotalKg', 16, 6)->nullable()->storedAs('(`AvgKg` * `Units`)');
            $table->decimal('Tariff', 16, 6)->nullable()->default(0);
            $table->tinyInteger('Selected')->nullable()->default(0);
            $table->integer('Dimension')->nullable();
            $table->integer('WasteClass')->nullable();
            $table->integer('Period')->nullable();
            $table->integer('Invoice')->nullable()->index('fk_invoice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entitygood');
    }
};
