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
        Schema::create('projects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ar_name', 1000);
            $table->string('en_name', 1000);
            $table->longText('ar_content');
            $table->longText('en_content');
            $table->string('image', 1000);
            $table->integer('top_menu');
            $table->integer('ordering');
            $table->string('de_name', 1000);
            $table->longText('de_content');
            $table->string('fr_name', 1000);
            $table->longText('fr_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
