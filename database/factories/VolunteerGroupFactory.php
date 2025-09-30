<?php

namespace Database\Factories;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteerGroup>
 */
class VolunteerGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_name' => $this->faker->company(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\VolunteerGroup $group) {
            $volunteers = Volunteer::all();

            if ($volunteers->count() < 5) {
                return;
            }

            $groupVolunteers = $volunteers->random(5);

            $leaderId = $groupVolunteers->random()->id;
            $subLeaderId = $groupVolunteers->where('id', '!=', $leaderId)->random()->id;

            foreach ($groupVolunteers as $v) {
                DB::table('volunteer_groups_volunteer')->insert([
                    'volunteer_group_id' => $group->id,
                    'volunteer_id' => $v->id,
                    'is_leader' => $v->id === $leaderId,
                    'is_subleader' => $v->id === $subLeaderId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
