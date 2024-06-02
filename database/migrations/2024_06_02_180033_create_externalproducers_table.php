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
        Schema::create('externalproducers', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Name', 1000)->default('0');
            $table->integer('ServiceRequestReport')->nullable()->index('fk1_colliactiondet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('externalproducers');
    }
};
