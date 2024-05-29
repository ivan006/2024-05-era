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
        Schema::create('objectvalue', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Trait')->nullable();
            $table->string('Value', 250)->nullable();
            $table->integer('Instance')->nullable();
            $table->json('ValueJson')->nullable();
            $table->integer('Object')->nullable();
            $table->integer('Entity')->nullable()->virtualAs('json_unquote(json_extract(`ValueJson`,_utf8mb4\'$.Entity\'))');

            $table->index(['Trait', 'Instance'], 'index 2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objectvalue');
    }
};
