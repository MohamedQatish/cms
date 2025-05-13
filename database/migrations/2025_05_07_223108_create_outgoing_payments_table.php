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
        Schema::create('outgoing_payments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('payment_for_id');
            $table->integer('amount');
            $table->date('date');
            $table->longText('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_payments');
    }
};
