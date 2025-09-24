<?php

namespace Database\Seeders;

use App\Models\HelpRequest;
use Illuminate\Database\Seeder;

class HelpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HelpRequest::factory()
            ->count(100)
            ->create();
    }
}
