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
        Schema::create('entityaudit', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('Entity Name', 50);
            $table->integer('Entity Id');
            $table->string('Operation', 50);
            $table->integer('SystemUser')->nullable()->index('fk_entityaudit_systemuser');
            $table->json('Changes')->nullable();
            $table->timestamp('Audit_TS')->useCurrent();

            $table->index(['Entity Name', 'Entity Id'], 'entity name_entity id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entityaudit');
    }
};
