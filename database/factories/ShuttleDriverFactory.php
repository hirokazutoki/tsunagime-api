<?php

namespace Database\Factories;

use App\Models\Volunteer;
use App\Models\VolunteerActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShuttleDriver>
 */
class ShuttleDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $volunteerActivity = VolunteerActivity::inRandomOrder()->first();
        $shuttleType = $this->faker->randomElement(['outbound', 'return']);
        $driver = Volunteer::inRandomOrder()->first();

        return [
            'volunteer_activity_id' => $volunteerActivity?->id,
            'shuttle_type' => $shuttleType,
            'volunteer_id' => $driver?->id,
        ];
    }
}
