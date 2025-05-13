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
        Schema::create('site_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('firstname', 1000);
            $table->string('lastname', 1000);
            $table->string('email', 1000);
            $table->string('telephone', 1000);
            $table->string('fax', 1000);
            $table->string('company', 1000);
            $table->string('address_1', 1000);
            $table->string('address_2', 1000);
            $table->string('city', 1000);
            $table->string('postcode', 1000);
            $table->string('country_id', 1000);
            $table->string('zone_id', 1000);
            $table->string('password', 1000);
            $table->integer('newsletter');
            $table->dateTime('register_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_users');
    }
};
