<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(10)->create();

        Client::factory([
            'name' => 'Hirokazu Toki',
            'email' => 'dev+client@hirokazutoki.com',
            'password' => Hash::make('Test1234'),])
            ->create();
    }
}
