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
        Schema::create('crm', function (Blueprint $table) {
            $table->integer('Id', true)->comment('This table will hold a history of all interactions with the entity');
            $table->integer('Entity')->nullable();
            $table->integer('EntityProduct')->nullable();
            $table->date('Contact')->nullable();
            $table->string('Description', 100)->nullable();
            $table->integer('Status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm');
    }
};
