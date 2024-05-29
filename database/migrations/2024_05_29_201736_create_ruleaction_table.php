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
        Schema::create('ruleaction', function (Blueprint $table) {
            $table->integer('Id', true);
            $table->integer('Rule')->nullable();
            $table->string('Process', 100)->nullable()->comment('The process to which the rule applies');
            $table->string('Result', 100)->nullable()->comment('The result to be passed back to the calling procedure.G112 This can be a colour code or a value like a price+G123');
            $table->string('ResultNegative', 100)->nullable()->comment('If the rule is not true then what result is returned');
            $table->string('ResultType', 50)->nullable()->comment('DATE/INT/VARCHAR/etc.');
            $table->string('Description', 100)->nullable()->comment('Describe the rule and the action expected');
            $table->string('ResultSystemCode', 100)->nullable();
            $table->string('NegativeSystemCode', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruleaction');
    }
};
