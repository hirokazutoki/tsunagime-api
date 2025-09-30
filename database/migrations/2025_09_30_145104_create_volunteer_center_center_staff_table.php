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
        Schema::create('volunteer_center_center_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_center_id');
            $table->foreignId('center_staff_id');
            $table->dateTime('assigned_at');
            $table->dateTime('unassigned_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_center_center_staff');
    }
};
