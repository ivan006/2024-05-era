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
        Schema::create('relative', function (Blueprint $table) {
            $table->integer('Id', true)->comment('This table will hold relatives even if the realtive is no longer a member of the policy of the principal member. For MIS purposes');
            $table->integer('Entity')->nullable()->comment('The policy number');
            $table->integer('Relative')->nullable();
            $table->integer('Relationship')->nullable()->comment('Spouse, Child, Extended Family');
            $table->integer('Adopted')->nullable()->comment('1 or 0');
            $table->integer('Student')->nullable()->comment('1 or 0');
            $table->integer('Disabled')->nullable()->comment('1 or 0');
            $table->integer('TraditionalMarriage')->nullable()->comment('1 or 0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relative');
    }
};
