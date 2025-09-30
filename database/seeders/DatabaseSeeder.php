<?php

namespace Database\Seeders;

use App\Models\Client;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClientSeeder::class);
        $this->call(ClientAvailabilityDateSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(VolunteerSeeder::class);
        $this->call(HelpRequestSeeder::class);
        $this->call(VolunteerGroupSeeder::class);
    }
}
