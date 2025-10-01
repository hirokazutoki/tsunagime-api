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
        Schema::create('shuttle_drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_activity_id');
            $table->enum('shuttle_type', ['outbound', 'return']); // TODO: 中継も要考慮
            // $table->string('model_name')->default('\App\Models\Volunteer'); // TODO: CenterStaffが行うことも要考慮
            $table->foreignId('volunteer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_activities_drivers');
    }
};
