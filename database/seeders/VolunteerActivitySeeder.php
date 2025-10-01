<?php

namespace Database\Seeders;

use App\Models\VolunteerActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerActivity::factory()->count(10)->create();
    }
}
