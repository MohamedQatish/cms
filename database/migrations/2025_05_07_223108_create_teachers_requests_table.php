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
        Schema::create('teachers_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->string('password');
            $table->string('phone', 20);
            $table->string('gender', 10);
            $table->integer('country_id');
            $table->text('image');
            $table->text('cv');
            $table->string('linkedin', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->integer('bank_type');
            $table->string('bank_accout_name', 255);
            $table->string('iban', 34); // IBAN max length is 34 characters
            $table->string('paypal', 255)->nullable();
            $table->text('payment_details')->nullable();
            $table->integer('status')->default(0);
            $table->string('instagram', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers_requests');
    }
};
