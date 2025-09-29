<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\HelpRequest;
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

    public function configure()
    {
        return $this->afterMaking(function (HelpRequest $helpRequest) {
            // まだDB保存前に加工する場合
            if ($helpRequest->process_status === 'completed' && $helpRequest->created_at) {
                $helpRequest->completed_at = $helpRequest->created_at->copy()->addDays(rand(3, 5));
            }
        });
    }
}
