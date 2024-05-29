<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPasswordhashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passwordhash', function (Blueprint $table) {
            $table->foreign('SystemUser')->references('Id')->on('systemuser')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passwordhash', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->dropForeign(['SystemUser']);
            
        });
    }
}