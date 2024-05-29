<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communication', function (Blueprint $table) {
            $table->foreign('RelativeID')->references('Id')->on('entity')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communication', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->dropForeign(['RelativeID']);
            
        });
    }
}