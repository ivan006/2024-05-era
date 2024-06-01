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
        Schema::create('ruleentityrole', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('EntityRole', 50)->nullable();
            $table->integer('Entity')->nullable();
            $table->integer('UserRole')->nullable();
            $table->integer('Rule');
            $table->integer('Priority')->nullable()->comment('If there are multiple rules on the base for the same objects then which one applies first');
            $table->integer('CRUD_Create')->nullable();
            $table->integer('CRUD_Read')->nullable();
            $table->integer('CRUD_Update')->nullable();
            $table->integer('CRUD_Delete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruleentityrole');
    }
};
