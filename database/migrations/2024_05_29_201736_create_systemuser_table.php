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
        Schema::create('systemuser', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Entity');
            $table->string('Username', 250)->nullable()->unique('username_unique');
            $table->boolean('Active')->default(false);
            $table->timestamp('LastSeen')->nullable();
            $table->integer('LoginCount')->nullable();
            $table->integer('FailedLoginAttempts')->nullable();
            $table->timestamp('LockedSince')->nullable()->index('index 5');
            $table->string('Secret', 32)->nullable();
            $table->string('Email', 254)->nullable();
            $table->string('Phone', 45)->nullable();
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();
            $table->integer('FbId')->nullable()->index('fbid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systemuser');
    }
};
