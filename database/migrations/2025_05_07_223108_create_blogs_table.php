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
        Schema::create('blogs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 1000);
            $table->longText('content');
            $table->integer('category_id');
            $table->date('date');
            $table->integer('featured');
            $table->string('image', 1000);
            $table->longText('short_text');
            $table->string('tr_title', 1000);
            $table->longText('tr_content');
            $table->longText('ar_short_text');
            $table->longText('tr_short_text');
            $table->string('ar_title', 1000);
            $table->longText('ar_content');
            $table->integer('ordering');
            $table->string('en_title', 1000);
            $table->longText('en_content');
            $table->string('en_short_text', 1000);
            $table->string('de_title', 1000);
            $table->longText('de_content');
            $table->string('de_short_text', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
