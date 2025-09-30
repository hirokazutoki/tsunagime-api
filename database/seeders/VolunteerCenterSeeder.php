<?php

namespace Database\Seeders;

use App\Models\VolunteerCenter;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerCenter::factory([
            'center_name' => config('tsunagime.volunteer_center.center_name'),
            'center_type' => 'headquarters',
            'opened_at' => Carbon::parse(config('tsunagime.volunteer_center.opened_at'))->toDateTimeString(),
            'address' => config('tsunagime.volunteer_center.address'),
            'longitude' => config('tsunagime.volunteer_center.longitude'),
            'latitude' => config('tsunagime.volunteer_center.latitude'),
        ])
        ->create();
    }
}
