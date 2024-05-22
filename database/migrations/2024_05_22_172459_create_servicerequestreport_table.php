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
        Schema::create('servicerequestreport', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ServiceRequest')->default(0)->index('fk1_servicerequest');
            $table->integer('ServiceProvider')->default(0)->index('fk2_serviceprovider');
            $table->integer('CreatedBy')->nullable()->default(0)->index('fk3_createdby');
            $table->integer('TreatmentDetails')->nullable()->index('fk_servicerequestreport_eranpc_qa.treatmentdetails');
            $table->date('CreatedOn')->nullable();
            $table->date('ReportDate')->nullable();
            $table->tinyInteger('Approved')->default(0);
            $table->tinyInteger('Rejected')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicerequestreport');
    }
};
