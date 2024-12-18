<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_activity_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_log_id')->constrained('log_activities')->onDelete('cascade');
            $table->string('accessing_app');
            $table->timestamp('accessing_at');
            $table->timestamp('accessing_until');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activity_details');
    }
};
