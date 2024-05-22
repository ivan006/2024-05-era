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
        Schema::create('entityrelationship', function (Blueprint $table) {
            $table->integer('Id', true)->comment('This table will hold relatives even if the realtive is no longer a member of the policy of the principal member. For MIS purposes');
            $table->integer('EntityA')->nullable()->comment('The policy number');
            $table->integer('EntityB')->nullable();
            $table->integer('EntityARelationship')->nullable()->comment('Spouse, Child, Extended Family');
            $table->integer('EntityBRelationship')->nullable()->comment('1 or 0');
            $table->integer('EntityAStatus')->nullable()->comment('1 or 0');
            $table->integer('EntityBStatus')->nullable()->comment('1 or 0');
            $table->integer('EntityAQualifier')->nullable()->comment('1 or 0');
            $table->integer('EntityBQualifier')->nullable();
            $table->integer('EntityALevel')->nullable();
            $table->integer('EntityBLevel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entityrelationship');
    }
};
