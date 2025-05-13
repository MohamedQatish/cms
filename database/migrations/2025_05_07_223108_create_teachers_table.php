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
        Schema::create('teachers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('full_name', 1000);
            $table->longText('details');
            $table->string('image', 1000);
            $table->string('linkedin', 1000);
            $table->string('facebook', 1000);
            $table->string('instagram', 1000);
            $table->string('email', 1000);
            $table->string('password', 1000);
            $table->string('paypal', 1000);
            $table->string('cv', 1000);
            $table->string('bank_type', 1000);
            $table->string('iban', 1000);
            $table->string('payment_details', 1000);
            $table->string('country_id', 1000);
            $table->string('gender', 10);
            $table->string('twitter', 1000);
            $table->string('phone', 1000);
            $table->string('forget_password_code', 1000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
