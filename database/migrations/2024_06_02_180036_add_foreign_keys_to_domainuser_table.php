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
        Schema::table('domainuser', function (Blueprint $table) {
            $table->foreign(['SystemUser'], 'FK_DomainUser_SystemUser')->references(['Id'])->on('systemuser')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domainuser', function (Blueprint $table) {
            $table->dropForeign('FK_DomainUser_SystemUser');
        });
    }
};
