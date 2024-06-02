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
        Schema::create('contactnumber', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Number', 45);
            $table->integer('Type')->index('fk_contactnumber_type_idx');
            $table->integer('Person')->nullable();
            $table->boolean('Preferred')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactnumber');
    }
};
