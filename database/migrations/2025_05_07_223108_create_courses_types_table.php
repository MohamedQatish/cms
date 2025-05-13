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
        Schema::create('courses_types', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ar_name', 1000);
            $table->string('en_name', 1000);
            $table->string('tr_name', 1000);
            $table->string('image', 1000);
            $table->integer('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_types');
    }
};
