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
        Schema::table('servicerequestfrequency', function (Blueprint $table) {
            $table->foreign(['ServiceRequest'], 'FK__servicerequest')->references(['Id'])->on('servicerequest')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['ReportFrequency'], 'FK__systemcode')->references(['Id'])->on('systemcode')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicerequestfrequency', function (Blueprint $table) {
            $table->dropForeign('FK__servicerequest');
            $table->dropForeign('FK__systemcode');
        });
    }
};
