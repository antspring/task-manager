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
            ['name' => 'Низкий'],
            ['name' => 'Средний'],
            ['name' => 'Высокий'],
        ];

        foreach ($priorities as $priority) {
            $priority['created_at'] = Carbon::now();

            DB::table('priority')->insert($priority);
        }
    }
}
