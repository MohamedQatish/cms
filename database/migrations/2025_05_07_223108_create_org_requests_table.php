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
        Schema::create('org_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 1000);
            $table->string('last_name', 1000);
            $table->string('email', 1000);
            $table->string('password', 1000);
            $table->string('phone', 1000);
            $table->string('website', 1000);
            $table->string('address', 1000);
            $table->string('image', 1000);
            $table->string('cv', 1000);
            $table->string('linkedin', 1000);
            $table->string('twitter', 1000);
            $table->string('facebook', 1000);
            $table->integer('bank_type');
            $table->string('bank_accout_name', 1000);
            $table->string('iban', 1000);
            $table->string('paypal', 1000);
            $table->string('payment_details', 1000);
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_requests');
    }
};
