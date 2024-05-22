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
        Schema::create('servicerequest', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->string('ServiceRequestNo', 1000)->nullable();
            $table->integer('ServiceProvider')->default(0)->index('fk__entity');
            $table->integer('CreatedBy')->default(0)->index('fk__systemuser');
            $table->timestamp('CreatedOn')->default('0000-00-00 00:00:00');
            $table->timestamp('FromDate')->default('0000-00-00 00:00:00');
            $table->timestamp('ToDate')->default('0000-00-00 00:00:00');
            $table->text('Services')->nullable();
            $table->text('Locations')->nullable();
            $table->text('Deliverables')->nullable();
            $table->timestamp('DeliveryDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicerequest');
    }
};
