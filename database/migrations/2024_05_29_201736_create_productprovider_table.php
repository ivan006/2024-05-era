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
        Schema::create('productprovider', function (Blueprint $table) {
            $table->integer('Id', true)->comment('Product provider created as an entity');
            $table->string('Name', 250)->default('0');
            $table->integer('Entity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productprovider');
    }
};
