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
        Schema::create('translations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 1000);
            $table->string('ar', 1000);
            $table->string('en', 1000);
            $table->string('de', 1000);
            $table->string('tr', 1000);
            $table->string('fr', 1000);
            $table->string('sw', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
