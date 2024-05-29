<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductproviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productprovider', function (Blueprint $table) {
            $table->foreign('Entity')->references('Id')->on('entity')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productprovider', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->dropForeign(['Entity']);
            
        });
    }
}