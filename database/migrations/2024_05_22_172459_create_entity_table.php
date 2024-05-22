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
        Schema::create('entity', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('ExternalNo', 100)->nullable()->comment('The number of the external organisation i.e. employee number');
            $table->integer('Level')->nullable()->comment('The level that the entity is assoicated with ');
            $table->integer('Type')->nullable();
            $table->integer('Title')->nullable();
            $table->string('Name', 80)->nullable();
            $table->string('Surname', 100)->nullable();
            $table->string('Identity', 100)->nullable();
            $table->date('BirthDate')->nullable();
            $table->integer('Gender')->nullable();
            $table->integer('Language')->nullable();
            $table->integer('Status')->nullable();
            $table->string('Note', 100)->nullable()->comment('This field will hold information related to the entity like whether they are hard of hearing or has special needs. This will be displayed to the contact centre');
            $table->string('Passport', 50)->nullable();
            $table->tinyInteger('HasPhoto')->nullable();
            $table->tinyInteger('IsPaid')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entity');
    }
};
