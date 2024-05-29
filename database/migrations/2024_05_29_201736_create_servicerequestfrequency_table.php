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
        Schema::create('servicerequestfrequency', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ServiceRequest')->default(0)->index('fk__servicerequest');
            $table->integer('ReportFrequency')->default(0)->index('fk__systemcode');
            $table->tinyInteger('Active')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicerequestfrequency');
    }
};
