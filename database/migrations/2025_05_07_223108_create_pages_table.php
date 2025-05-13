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
        Schema::create('pages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 2100);
            $table->string('ar_name', 1000);
            $table->longText('ar_content');
            $table->string('en_name', 1000);
            $table->string('de_name', 2000);
            $table->longText('en_content');
            $table->longText('de_content');
            $table->integer('useful_links');
            $table->integer('top_menu');
            $table->integer('parent_id');
            $table->integer('ordering');
            $table->string('tr_name', 1000);
            $table->longText('tr_content');
            $table->string('sw_name', 1000);
            $table->longText('sw_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
