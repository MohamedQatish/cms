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
        Schema::create('teacher_student_message', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->string('message', 1000);
            $table->integer('from_t_to_s');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_student_message');
    }
};
