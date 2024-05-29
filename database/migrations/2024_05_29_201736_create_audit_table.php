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
        Schema::create('audit', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('TableName', 100)->nullable();
            $table->string('CRUD', 100)->nullable();
            $table->string('Data', 1000)->nullable();
            $table->date('ChangeDate')->nullable();
            $table->integer('Entity')->nullable();
            $table->integer('PageNo')->nullable();
            $table->integer('NoOfLines')->nullable();
            $table->string('CrudMessage', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit');
    }
};
