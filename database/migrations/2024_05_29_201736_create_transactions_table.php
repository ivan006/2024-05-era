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
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('TransNo', 50)->default('0');
            $table->string('Description', 1000)->nullable();
            $table->date('TransactionDate')->nullable();
            $table->date('CaptureDate')->nullable();
            $table->string('AccountCode', 50)->nullable();
            $table->integer('Entity')->nullable();
            $table->integer('EntityProduct')->nullable();
            $table->decimal('Debit', 16)->nullable();
            $table->decimal('Credit', 16)->nullable();
            $table->string('Source', 50)->nullable();
            $table->integer('Period')->nullable();
            $table->string('Reference', 1000)->nullable();
            $table->integer('Type')->nullable()->index('fk_transactions_systemcode');

            $table->index(['AccountCode', 'Source'], 'index2');
            $table->index(['AccountCode', 'Period', 'Type', 'EntityProduct'], 'index3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
