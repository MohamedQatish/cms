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
        Schema::create('courses_reviews', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('fullname', 1000);
            $table->string('stars', 1000);
            $table->longText('comment');
            $table->integer('course_id');
            $table->string('date', 1000);
            $table->string('approved', 1000);
            $table->string('email', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_reviews');
    }
};
