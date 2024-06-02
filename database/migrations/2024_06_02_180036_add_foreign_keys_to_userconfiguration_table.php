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
        Schema::table('userconfiguration', function (Blueprint $table) {
            $table->foreign(['Language'], 'FK_UserConfiguration_Language')->references(['Id'])->on('systemcode')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['SystemUser'], 'FK_UserConfiguration_SystemUser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userconfiguration', function (Blueprint $table) {
            $table->dropForeign('FK_UserConfiguration_Language');
            $table->dropForeign('FK_UserConfiguration_SystemUser');
        });
    }
};
