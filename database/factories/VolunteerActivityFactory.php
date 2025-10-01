<?php

namespace Database\Factories;

use App\Models\CenterStaff;
use App\Models\HelpRequest;
use App\Models\VolunteerGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteerActivity>
 */
class VolunteerActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $helpRequest = HelpRequest::whereIn('process_status', ['processing', 'completed'])->inRandomOrder()->first();
        $volunteerGroup = VolunteerGroup::inRandomOrder()->first();
        $centerStaff = CenterStaff::inRandomOrder()->first();
        $processStatus = $this->faker->randomElement(['waiting_for_outbound', 'outbound', 'active', 'waiting_for_return', 'return', 'reporting', 'finished']);

        return [
            'help_request_id' => $helpRequest?->id,
            'volunteer_group_id' => $volunteerGroup?->id,
            'center_staff_id' => $centerStaff?->id,
            'activity_date' => $this->faker->dateTimeBetween('-1 month', '+1 days'),
            'process_status' => $processStatus,
            'activity_record' => $this->faker->paragraph,
            'next_activity_note' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
