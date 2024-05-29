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
        Schema::table('communication', function (Blueprint $table) {
            $table->foreign(['SentBy'], 'FK_communication_systemuser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('communication', function (Blueprint $table) {
            $table->dropForeign('FK_communication_systemuser');
        });
    }
};
