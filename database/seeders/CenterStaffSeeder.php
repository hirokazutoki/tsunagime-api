<?php

namespace Database\Seeders;

use App\Models\CenterStaff;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereNot('email', 'test@hirokazutoki.com')->inRandomOrder()->limit(10)->get();

        foreach ($users as $user) {
            CenterStaff::factory([
                'user_id' => $user->id,
            ])->create();
        }

        $user = User::whereEmail('test@hirokazutoki.com')->firstOrFail();

        CenterStaff::factory([
            'user_id' => $user->id,
        ])->create();
    }
}
