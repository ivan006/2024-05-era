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
        Schema::table('systemcode', function (Blueprint $table) {
            $table->foreign(['Entity'], 'FK_systemcode_entity')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('systemcode', function (Blueprint $table) {
            $table->dropForeign('FK_systemcode_entity');
        });
    }
};
