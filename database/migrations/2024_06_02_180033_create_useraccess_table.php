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
        Schema::create('useraccess', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('SystemUser')->nullable()->index('fk_useraccess_systemuser_idx');
            $table->integer('UserRole')->nullable()->index('fk_useraccess_userrole_idx');
            $table->integer('SystemAction')->nullable()->index('fk_useraccess_systemaction');
            $table->bigInteger('Entity')->nullable()->index('fk_useraccess_districtchurch_idx');
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();
            $table->integer('FbId')->nullable()->index('fbid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useraccess');
    }
};
