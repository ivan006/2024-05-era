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
        Schema::create('systemlog', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->dateTime('LogDate');
            $table->string('LogLevel', 5)->nullable();
            $table->string('Logger', 80)->nullable();
            $table->string('SystemUser', 50)->nullable();
            $table->text('CallSite')->nullable();
            $table->text('Message')->nullable();
            $table->text('Exception')->nullable();
            $table->text('StackTrace')->nullable();

            $table->primary(['Id', 'LogDate']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systemlog');
    }
};
