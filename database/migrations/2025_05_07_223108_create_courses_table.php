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
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 1000);
            $table->string('cost', 1000);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('course_type');
            $table->longText('short_details');
            $table->longText('details');
            $table->string('image', 1000);
            $table->integer('visible');
            $table->integer('featured');
            $table->string('meta_keywords', 1000);
            $table->string('slug', 1000);
            $table->longText('meta_description');
            $table->integer('views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
