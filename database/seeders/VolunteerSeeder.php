<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereNot('email', 'test@hirokazutoki.com')->inRandomOrder()->limit(10)->get();

        foreach ($users as $user) {
            Volunteer::factory([
                'user_id' => $user->id,
            ])->create();
        }

        $user = User::whereEmail('test@hirokazutoki.com')->firstOrFail();

        Volunteer::factory([
            'user_id' => $user->id,
        ])->create();
    }
}
