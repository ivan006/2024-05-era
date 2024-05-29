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
        Schema::table('good', function (Blueprint $table) {
            $table->foreign(['Sector'], 'FK1_sector')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('good', function (Blueprint $table) {
            $table->dropForeign('FK1_sector');
        });
    }
};
