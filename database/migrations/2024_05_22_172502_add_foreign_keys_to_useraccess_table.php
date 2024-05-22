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
        Schema::table('useraccess', function (Blueprint $table) {
            $table->foreign(['SystemAction'], 'FK_UserAccess_SystemAction')->references(['Id'])->on('systemaction')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['SystemUser'], 'FK_UserAccess_SystemUser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['UserRole'], 'FK_UserAccess_UserRole')->references(['Id'])->on('userrole')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('useraccess', function (Blueprint $table) {
            $table->dropForeign('FK_UserAccess_SystemAction');
            $table->dropForeign('FK_UserAccess_SystemUser');
            $table->dropForeign('FK_UserAccess_UserRole');
        });
    }
};
