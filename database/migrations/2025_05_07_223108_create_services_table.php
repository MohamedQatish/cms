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
        Schema::create('services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('icon', 1000);
            $table->string('ar_name', 1000);
            $table->string('en_name', 1000);
            $table->string('fr_name', 1000);
            $table->string('ar_content', 2000);
            $table->string('en_content', 2000);
            $table->string('fr_content', 2000);
            $table->string('background_image', 1000);
            $table->string('link', 1000);
            $table->string('de_name', 1000);
            $table->string('de_content', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
