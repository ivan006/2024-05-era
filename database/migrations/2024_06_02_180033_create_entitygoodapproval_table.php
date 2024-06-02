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
        Schema::create('entitygoodapproval', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('ApprovedBy')->default(0)->index('fk_entitygoodapproval_entity');
            $table->dateTime('ApprovedOn');
            $table->integer('InvoiceApprovedBy')->nullable()->index('fk_entitygoodapproval_invoiceapprovedon');
            $table->dateTime('InvoiceApprovedOn')->nullable();
            $table->integer('Entity')->default(0)->index('fk_entitygoodapprove_entity');
            $table->integer('Period')->default(0);
            $table->string('PurchaseOrder', 50)->nullable();
            $table->string('InvoiceNo', 50)->nullable();
            $table->tinyInteger('UseAR')->default(0);
            $table->tinyInteger('UseVAT')->default(0);
            $table->integer('Query')->nullable()->index('fk_entitygoodapproval_queryheader');
            $table->tinyInteger('Status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entitygoodapproval');
    }
};
