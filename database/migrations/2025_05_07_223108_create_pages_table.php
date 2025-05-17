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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('content');

            $table->string('title')->nullable();
            $table->integer('useful_links')->default(0);
            $table->boolean('top_menu')->default(false);
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->integer('ordering')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
