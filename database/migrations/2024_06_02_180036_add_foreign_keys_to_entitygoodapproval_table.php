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
        Schema::table('entitygoodapproval', function (Blueprint $table) {
            $table->foreign(['ApprovedBy'], 'FK_entitygoodapproval_entity')->references(['Id'])->on('entity')->onUpdate('restrict')->onDelete('no action');
            $table->foreign(['InvoiceApprovedBy'], 'FK_entitygoodapproval_InvoiceApprovedOn')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Query'], 'FK_entitygoodapproval_queryheader')->references(['Id'])->on('queryheader')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Entity'], 'FK_entitygoodapprove_entity')->references(['Id'])->on('entity')->onUpdate('restrict')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entitygoodapproval', function (Blueprint $table) {
            $table->dropForeign('FK_entitygoodapproval_entity');
            $table->dropForeign('FK_entitygoodapproval_InvoiceApprovedOn');
            $table->dropForeign('FK_entitygoodapproval_queryheader');
            $table->dropForeign('FK_entitygoodapprove_entity');
        });
    }
};
