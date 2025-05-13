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
        Schema::create('activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('page', 1000);
            $table->integer('item_id');
            $table->string('ip', 1000);
            $table->dateTime('date');
            $table->integer('user_id');
            $table->string('city', 1000);
            $table->integer('link_id');
            $table->string('device', 1000);
            $table->string('platform', 1000);
            $table->string('country', 1000);
            $table->string('device_type', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
