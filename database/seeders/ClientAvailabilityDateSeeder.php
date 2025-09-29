<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientAvailabilityDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientAvailabilityDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();

        foreach ($clients as $client) {
            // 各クライアントに3件ずつ作る
            $dates = collect(range(1, 30))
                ->map(fn ($i) => now()->addDays($i)->format('Y-m-d'))
                ->shuffle()
                ->take(3);

            if ($client->email === 'dev+client@hirokazutoki.com') {
                // 今日も加える
                $dates->push(now()->format('Y-m-d'));
            }

            foreach ($dates as $date) {
                ClientAvailabilityDate::factory()->create([
                    'client_id' => $client->id,
                    'availability_date' => $date,
                ]);
            }
        }
    }
}
