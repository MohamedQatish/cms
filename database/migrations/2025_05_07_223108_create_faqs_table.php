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
        Schema::create('faqs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ar_qs', 1000);
            $table->string('en_qs', 1000);
            $table->string('fr_qs', 1000);
            $table->string('ar_answer', 1000);
            $table->string('en_answer', 1000);
            $table->string('fr_answer', 1000);
            $table->integer('ordering');
            $table->string('de_qs', 1000);
            $table->string('de_answer', 1000);
            $table->string('tr_qs', 1000);
            $table->string('tr_answer', 1000);
            $table->string('sw_qs', 1000);
            $table->string('sw_answer', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
