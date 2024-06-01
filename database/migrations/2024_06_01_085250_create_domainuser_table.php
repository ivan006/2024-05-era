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
        Schema::create('domainuser', function (Blueprint $table) {
            $table->integer('SystemUser')->primary();
            $table->string('DomainName', 155);
            $table->string('DomainAccount', 20);
            $table->timestamp('CreatedOn')->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->timestamp('ChangedOn')->nullable();
            $table->string('ChangedBy', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domainuser');
    }
};
