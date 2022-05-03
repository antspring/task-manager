<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'Новые задачи'],
            ['name' => 'В работе'],
            ['name' => 'Рассматриваются'],
            ['name' => 'Выполнено'],
        ];

        foreach ($statuses as $status) {
            $status['created_at'] = Carbon::now();

            DB::table('status')->insert($status);
        }
    }
}
