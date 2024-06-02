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
        Schema::create('userroleaccess', function (Blueprint $table) {
            $table->integer('UserRole');
            $table->integer('SystemAction')->index('fk_userroleaccess_systemaction_idx');
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();
            $table->integer('FbId')->nullable()->index('fbid');
            $table->integer('Rule')->nullable()->index('fk_userroleaccess_rule_idx');

            $table->primary(['UserRole', 'SystemAction']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userroleaccess');
    }
};
