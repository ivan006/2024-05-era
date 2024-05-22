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
        Schema::create('communication', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Type', 50)->nullable()->comment('SMS/EMAIL');
            $table->string('Status', 100)->nullable()->comment('Sent/Failed');
            $table->integer('SentBy')->nullable()->index('fk_communication_systemuser');
            $table->string('SentTo', 500)->nullable();
            $table->timestamp('SentOn')->nullable();
            $table->longText('Content')->nullable();
            $table->string('RelativeName', 50)->nullable();
            $table->integer('RelativeID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication');
    }
};
