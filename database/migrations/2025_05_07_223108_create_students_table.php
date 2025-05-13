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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('mobile', 20);
            $table->string('kimlik_no', 20);
            $table->text('address');
            $table->text('picture');
            $table->text('kimlik_picture');
            $table->string('father_name', 255);
            $table->string('mother_name', 255);
            $table->string('gender', 10);
            $table->string('scoial_stat', 10);
            $table->date('birthday');
            $table->integer('nationality');
            $table->string('birth_place', 255);
            $table->string('ID_no', 50);
            $table->string('gmail', 255);
            $table->string('email', 255);
            $table->string('password');
            $table->string('forget_password_code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
