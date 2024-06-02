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
        Schema::create('bank', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Name')->nullable()->comment('SystemCode');
            $table->string('Branch', 100)->nullable();
            $table->string('BranchName', 100)->nullable();
            $table->integer('Type')->nullable()->comment('SystemCode');
            $table->integer('BankType')->nullable();
            $table->string('Account', 100)->nullable();
            $table->integer('Verified')->nullable();
            $table->integer('Entity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank');
    }
};
