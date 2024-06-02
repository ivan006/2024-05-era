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
        Schema::table('contactnumber', function (Blueprint $table) {
            $table->foreign(['Type'], 'FK_ContactNumber_Type')->references(['Id'])->on('systemcode')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contactnumber', function (Blueprint $table) {
            $table->dropForeign('FK_ContactNumber_Type');
        });
    }
};
