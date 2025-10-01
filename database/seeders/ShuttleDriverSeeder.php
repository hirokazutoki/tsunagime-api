<?php

namespace Database\Seeders;

use App\Models\ShuttleDriver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShuttleDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShuttleDriver::factory()->count(10)->create();
    }
}
