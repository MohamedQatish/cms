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
        Schema::create('banners', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('image_ar', 1000);
            $table->string('url', 1000);
            $table->string('details', 1000);
            $table->string('image_en', 1000);
            $table->string('image_de', 1000);
            $table->integer('visible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
