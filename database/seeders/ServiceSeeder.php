<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'vehicle_id' => 2,
                'service_date' => Carbon::now()->subMonths(1),
                'description' => 'Penggantian oli mesin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 2,
                'service_date' => Carbon::now()->subMonths(2),
                'description' => 'Penggantian filter udara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 5,
                'service_date' => Carbon::now()->subMonths(1),
                'description' => 'Pengecekan rem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
