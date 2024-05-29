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
        Schema::create('object', function (Blueprint $table) {
            $table->comment('This table will hold one row for each object');
            $table->integer('Id', true);
            $table->string('Name', 250);
            $table->string('Description', 250);
            $table->integer('Parent')->nullable()->default(0);
            $table->integer('ChildType')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('object');
    }
};
