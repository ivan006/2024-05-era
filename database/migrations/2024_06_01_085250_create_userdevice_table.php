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
        Schema::create('userdevice', function (Blueprint $table) {
            $table->integer('SystemUser');
            $table->string('DeviceKey', 32);
            $table->string('Name', 100);
            $table->timestamp('LastUsed')->nullable()->useCurrent();
            $table->integer('FbId')->nullable()->index('fbid');

            $table->primary(['SystemUser', 'DeviceKey']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdevice');
    }
};
