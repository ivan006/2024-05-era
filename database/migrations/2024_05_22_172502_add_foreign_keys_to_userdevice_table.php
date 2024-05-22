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
        Schema::table('userdevice', function (Blueprint $table) {
            $table->foreign(['SystemUser'], 'FK_UserDevice_SystemUser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userdevice', function (Blueprint $table) {
            $table->dropForeign('FK_UserDevice_SystemUser');
        });
    }
};
