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
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nik');
            $table->string('ip_address');
            $table->string('otp_code');
            $table->string('otp_encrypt');
            $table->timestamp('otp_valid_start');
            $table->timestamp('otp_valid_until');
            $table->timestamp('otp_verified_at');
            $table->timestamp('login_at');
            $table->timestamp('logout_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activities');
    }
};
