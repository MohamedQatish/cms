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
        Schema::create('balance_cards', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 1000);
            $table->integer('used');
            $table->integer('user_id');
            $table->string('used_date', 1000);
            $table->string('amount', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_cards');
    }
};
