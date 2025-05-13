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
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ar_name', 1000);
            $table->integer('parent_id');
            $table->integer('ordering');
            $table->integer('hide');
            $table->string('en_name', 1000);
            $table->string('de_name', 1000);
            $table->string('image', 1000);
            $table->string('thumbnail', 1000);
            $table->integer('most_popular');
            $table->integer('our_products');
            $table->integer('top');
            $table->string('tr_name', 1000);
            $table->string('fr_name', 1000);
            $table->string('sw_name', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
