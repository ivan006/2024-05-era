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
        Schema::table('entitygood', function (Blueprint $table) {
            $table->foreign(['Good'], 'FK__good')->references(['Id'])->on('good')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Entity'], 'FK_entitygood_entity')->references(['Id'])->on('entity')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['Invoice'], 'FK_invoice')->references(['Id'])->on('entitygoodapproval')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entitygood', function (Blueprint $table) {
            $table->dropForeign('FK__good');
            $table->dropForeign('FK_entitygood_entity');
            $table->dropForeign('FK_invoice');
        });
    }
};
