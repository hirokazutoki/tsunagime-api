<?php

namespace Database\Seeders;

use App\Models\VolunteerGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerGroup::factory()->count(10)->create();
    }
}
