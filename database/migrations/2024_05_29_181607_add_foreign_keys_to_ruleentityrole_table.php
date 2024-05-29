<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleentityroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ruleentityrole', function (Blueprint $table) {
            $table->foreign('Rule')->references('Id')->on('rule')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruleentityrole', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->dropForeign(['Rule']);
            
        });
    }
}