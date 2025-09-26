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
        // User::factory(10)->create();

        Client::factory()->create([
            'name' => 'Hirokazu Toki',
            'email' => 'dev+client@hirokazutoki.com',
            'password' => Hash::make('Test1234'),
        ]);

        $this->call(AdministratorSeeder::class);
        $this->call(HelpRequestSeeder::class);
    }
}
