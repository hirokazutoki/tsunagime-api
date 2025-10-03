<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VolunteerCenterSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ClientAvailabilityDateSeeder::class);
        $this->call(CenterStaffSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(VolunteerSeeder::class);
        $this->call(HelpRequestSeeder::class);
        $this->call(VolunteerGroupSeeder::class);
        $this->call(VolunteerActivitySeeder::class);
        $this->call(ShuttleDriverSeeder::class);
        $this->call(TruckDriverSeeder::class);
    }
}
