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
        Schema::create('help_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->text('description')->nullable();
            $table->enum('process_status', ['pending', 'processing', 'completed', 'canceled'])->default('pending');
            $table->dateTime('completed_at')->nullable();
            $table->string('address');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->enum('geocode_status', ['pending', 'success', 'failed'])->default('pending');
            $table->text('geocode_error_message')->nullable();
            $table->timestamps();
            $table->timestamp('geocoded_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_requests');
    }
};
