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
            $table->id();
            $table->string('name', 255);
            $table->boolean('active')->default(true);
            $table->string('file_name', 255);
            $table->unsignedInteger('ordering')->default(0);
            $table->unsignedInteger('duration')->nullable()->default(null);
            $table->foreignId('effect_id')->nullable()->constrained('effects')->nullOnDelete();
            $table->json('settings')->nullable();
            $table->timestamps();
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
