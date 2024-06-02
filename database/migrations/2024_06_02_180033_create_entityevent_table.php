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
        Schema::create('entityevent', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('TableID')->nullable();
            $table->string('TableName', 50)->nullable();
            $table->string('Event', 150)->nullable();
            $table->date('Date')->nullable();
            $table->integer('Instance')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entityevent');
    }
};
