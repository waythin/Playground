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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            // $table->string('otp')->nullable();
            // $table->dateTime('otp_expire_at')->nullable();
            // $table->boolean('is_email_verified')->nullable();
            // $table->boolean('is_mobile_verified')->nullable();
            // $table->string('status')->default('active');
            // $table->string('device_token')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
