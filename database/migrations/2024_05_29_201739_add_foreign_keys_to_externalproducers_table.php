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
        Schema::table('externalproducers', function (Blueprint $table) {
            $table->foreign(['ServiceRequestReport'], 'FK_externalproducers_servicerequestreport')->references(['Id'])->on('servicerequestreport')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('externalproducers', function (Blueprint $table) {
            $table->dropForeign('FK_externalproducers_servicerequestreport');
        });
    }
};
