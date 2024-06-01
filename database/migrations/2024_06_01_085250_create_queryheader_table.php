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
        Schema::create('queryheader', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Subject', 150)->nullable();
            $table->integer('Status')->nullable();
            $table->integer('Type')->nullable();
            $table->string('RelativeName', 200)->nullable();
            $table->integer('RelativeID')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->timestamp('CreatedOn')->useCurrent();
            $table->integer('ClosedBy')->nullable();
            $table->timestamp('ClosedOn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queryheader');
    }
};
