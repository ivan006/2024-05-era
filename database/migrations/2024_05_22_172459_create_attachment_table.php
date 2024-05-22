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
        Schema::create('attachment', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Name', 1000)->nullable();
            $table->string('Description', 1000)->nullable();
            $table->string('ContentType', 1000)->nullable();
            $table->string('Path', 1000)->nullable();
            $table->string('RelativeName', 1000)->nullable();
            $table->integer('RelativeID')->nullable();
            $table->timestamp('CreatedOn')->useCurrent();
            $table->integer('CreatedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment');
    }
};
