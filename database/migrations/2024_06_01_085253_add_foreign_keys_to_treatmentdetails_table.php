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
        Schema::table('treatmentdetails', function (Blueprint $table) {
            $table->foreign(['ServiceRequestReport'], 'FK1_servicerequestreport')->references(['Id'])->on('servicerequestreport')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('treatmentdetails', function (Blueprint $table) {
            $table->dropForeign('FK1_servicerequestreport');
        });
    }
};
