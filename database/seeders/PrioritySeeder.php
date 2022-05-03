<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        $priorities = [
            [
                'name' => 'Низкий',
                'color' => '#0FBF4B'
            ],
            [
                'name' => 'Средний',
                'color' => '#E7A807'
            ],
            [
                'name' => 'Высокий',
                'color' => '#CE3166'
            ],
        ];

        foreach ($priorities as $priority) {
            $priority['created_at'] = Carbon::now();

            DB::table('priority')->insert($priority);
        }
    }
}
