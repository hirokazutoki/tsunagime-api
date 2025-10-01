<?php

namespace Database\Factories;

use App\Models\Volunteer;
use App\Models\VolunteerActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TruckDriver>
 */
class TruckDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $volunteerActivity = VolunteerActivity::inRandomOrder()->first();
        $driver = Volunteer::inRandomOrder()->first();

        return [
            'volunteer_activity_id' => $volunteerActivity?->id,
            'volunteer_id' => $driver?->id,
        ];
    }
}
