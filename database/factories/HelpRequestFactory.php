<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HelpRequest>
 */
class HelpRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' =>  $this->faker->sentence(),
            'process_status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'canceled']),
            'address' => $this->faker->address(),
            'longitude' => $this->faker->longitude(134.75, 134.85),
            'latitude' => $this->faker->latitude(35.45, 35.65),
            'client_id' => Client::inRandomOrder()->first()?->id,
        ];
    }
}
