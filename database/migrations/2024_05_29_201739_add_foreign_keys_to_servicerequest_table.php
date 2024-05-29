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
        Schema::table('servicerequest', function (Blueprint $table) {
            $table->foreign(['ServiceProvider'], 'FK__entity')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['CreatedBy'], 'FK__systemuser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicerequest', function (Blueprint $table) {
            $table->dropForeign('FK__entity');
            $table->dropForeign('FK__systemuser');
        });
    }
};
