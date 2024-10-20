<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id(); // Optional, jika Anda ingin menambah ID unik untuk setiap relasi
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Mengaitkan ke tabel users
            $table->foreignId('role_id')->constrained('role_apps')->onDelete('cascade'); // Mengaitkan ke tabel role_apps
            $table->timestamps(); // Menyimpan timestamp jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
