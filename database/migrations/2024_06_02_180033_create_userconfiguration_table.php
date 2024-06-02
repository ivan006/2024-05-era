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
        Schema::create('userconfiguration', function (Blueprint $table) {
            $table->integer('SystemUser')->primary();
            $table->integer('Language')->index('fk_userconfiguration_language_idx');
            $table->integer('FbId')->nullable()->index('fbid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userconfiguration');
    }
};
