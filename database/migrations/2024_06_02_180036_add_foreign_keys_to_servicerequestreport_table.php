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
        Schema::table('servicerequestreport', function (Blueprint $table) {
            $table->foreign(['ServiceRequest'], 'FK1_servicerequest')->references(['Id'])->on('servicerequest')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['ServiceProvider'], 'FK2_serviceprovider')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['CreatedBy'], 'FK3_createdby')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['TreatmentDetails'], 'FK_servicerequestreport_eranpc_qa.treatmentdetails')->references(['Id'])->on('treatmentdetails')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicerequestreport', function (Blueprint $table) {
            $table->dropForeign('FK1_servicerequest');
            $table->dropForeign('FK2_serviceprovider');
            $table->dropForeign('FK3_createdby');
            $table->dropForeign('FK_servicerequestreport_eranpc_qa.treatmentdetails');
        });
    }
};
