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
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ar_title', 1000);
            $table->string('link', 10000);
            $table->integer('parent_id');
            $table->integer('is_father');
            $table->string('icon', 1000);
            $table->integer('ordering');
            $table->string('en_title', 1000);
            $table->string('tr_title', 1000);
            $table->integer('visible');
            $table->integer('lms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
