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
        Schema::create('treatmentdetails', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ServiceRequestReport')->nullable()->index('fk1_servicerequestreport');
            $table->decimal('OpeningBalance', 20, 6)->nullable();
            $table->decimal('Refurbished', 20, 6)->nullable();
            $table->decimal('Recovered', 20, 6)->nullable();
            $table->decimal('Export', 20, 6)->nullable();
            $table->decimal('Energy', 20, 6)->nullable();
            $table->decimal('Landfill', 20, 6)->nullable();
            $table->decimal('LocalSecondaryProducts', 20, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatmentdetails');
    }
};
