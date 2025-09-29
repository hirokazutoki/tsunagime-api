<?php

namespace Database\Seeders;

use App\Models\HelpRequest;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HelpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 例：50件分のランダム日付をまず生成
        $dates = collect(range(1, 100))->map(function () {
            return Carbon::now()
                ->subDays(rand(0, 100))
                ->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        });

        // 昇順にソート
        $dates = $dates->sort();

        // 並び替えた日付でFactory作成
        foreach ($dates as $randomDate) {
            HelpRequest::factory()
                ->state([
                    'created_at' => $randomDate,
                    'updated_at' => $randomDate,
                ])
                ->create();
        }
    }
}
