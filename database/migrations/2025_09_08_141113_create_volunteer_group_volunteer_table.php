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
        Schema::create('volunteer_groups_volunteer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_group_id');
            $table->foreignId('volunteer_id');
            $table->boolean('is_leader')->default(false);
            $table->boolean('is_subleader')->default(false);
            $table->timestamps();
        });
    }
};
