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
        Schema::create('live_classes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 1000);
            $table->string('meeting_id', 1000);
            $table->string('meeting_password', 1000);
            $table->integer('course_id');
            $table->integer('section_id');
            $table->string('remarks', 1000);
            $table->date('date');
            $table->string('start_time', 1000);
            $table->string('end_time', 1000);
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
