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
        Schema::create('homepage_widgets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 1000);
            $table->integer('active');
            $table->string('file_name', 1000);
            $table->integer('ordering');
            $table->string('effect', 1000);
            $table->string('duration', 100);
            $table->string('settings', 5000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_widgets');
    }
};
