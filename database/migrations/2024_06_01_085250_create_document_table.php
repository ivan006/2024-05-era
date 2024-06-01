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
        Schema::create('document', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('RelativeName', 50)->nullable();
            $table->integer('RelativeID')->nullable();
            $table->string('Comment', 1000)->nullable();
            $table->string('Title', 100)->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->timestamp('CreatedOn')->nullable();
            $table->json('Access')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
