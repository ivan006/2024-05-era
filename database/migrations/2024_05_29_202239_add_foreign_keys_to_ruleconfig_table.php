<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleconfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ruleconfig', function (Blueprint $table) {
            $table->foreign('Rule')->references('Id')->on('rule')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruleconfig', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->dropForeign(['Rule']);
            
        });
    }
}