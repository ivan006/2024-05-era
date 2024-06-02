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
        Schema::create('address', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('StreetNo', 8)->nullable();
            $table->string('StreetName', 45)->nullable();
            $table->string('Building', 1000)->nullable();
            $table->string('Postal', 45)->nullable();
            $table->string('Suburb', 45)->nullable();
            $table->string('City', 45)->nullable();
            $table->string('Province', 45)->nullable();
            $table->integer('Country')->nullable()->index('fk_address_country_idx');
            $table->string('PostCode', 5)->nullable();
            $table->integer('Type')->nullable()->index('fk_address_type_idx');
            $table->integer('Person')->nullable();
            $table->date('MoveDate')->nullable();
            $table->boolean('Preferred')->nullable();
            $table->boolean('Dispatch')->nullable();
            $table->decimal('Latitude', 9, 7)->nullable();
            $table->decimal('Longitude', 10, 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
