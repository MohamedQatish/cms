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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 1000);
            $table->string('email', 1000);
            $table->longText('message');
            $table->string('subject', 1000);
            $table->date('date');
            $table->integer('seen');
            $table->string('phone', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
