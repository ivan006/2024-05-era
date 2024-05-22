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
        Schema::table('address', function (Blueprint $table) {
            $table->foreign(['Country'], 'FK_Address_Country')->references(['Id'])->on('systemcode')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Type'], 'FK_Address_Type')->references(['Id'])->on('systemcode')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address', function (Blueprint $table) {
            $table->dropForeign('FK_Address_Country');
            $table->dropForeign('FK_Address_Type');
        });
    }
};
