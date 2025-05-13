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
        Schema::create('courses_enrolls_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('course_id');
            $table->integer('student_id');
            $table->string('date', 1000);
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_enrolls_requests');
    }
};
