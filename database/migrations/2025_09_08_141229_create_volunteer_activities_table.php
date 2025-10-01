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
        Schema::create('volunteer_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('help_request_id');
            $table->foreignId('volunteer_group_id');
            $table->foreignId('center_staff_id');
            $table->date('activity_date');
            $table->enum('process_status', ['waiting_for_outbound', 'outbound', 'active', 'waiting_for_return', 'return', 'reporting', 'finished'])->default('waiting_for_outbound');
            $table->text('activity_record')->nullable();
            $table->text('next_activity_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_activities');
    }
};
