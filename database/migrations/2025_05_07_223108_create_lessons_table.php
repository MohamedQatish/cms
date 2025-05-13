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
        Schema::create('lessons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('subject_id');
            $table->string('name', 1000);
            $table->string('video', 1000);
            $table->longText('details');
            $table->integer('ordering');
            $table->string('duration', 100);
            $table->integer('free_preview');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
