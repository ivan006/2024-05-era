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
        Schema::create('requirement', function (Blueprint $table) {
            $table->integer('Id', true)->comment('This is the definition table');
            $table->string('Service', 50)->nullable()->comment('Advice/Product/Vendor/Entity/Product Provider');
            $table->string('Category', 50)->nullable()->comment('At what stage in the lifecycle of the product is the requirement needed. Like creation as opposed to claims. Death certificate needed at claim stage.');
            $table->integer('Code')->nullable();
            $table->string('Name', 1000)->nullable();
            $table->integer('Required')->nullable();
            $table->string('Path', 250)->nullable();
            $table->integer('Display')->nullable();
            $table->string('SystemCodeContext', 100)->nullable();
            $table->string('SystemCodeField', 100)->nullable();
            $table->integer('ValueType')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement');
    }
};
