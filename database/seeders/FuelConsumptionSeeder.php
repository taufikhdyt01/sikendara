<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FuelConsumptionSeeder extends Seeder
{
    public function run()
    {
        DB::table('fuel_consumptions')->insert([
            [
                'vehicle_id' => 1,
                'fuel_type' => 'Pertamax',
                'date' => Carbon::now()->subDays(2),
                'liters' => 50.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 2,
                'fuel_type' => 'Solar',
                'date' => Carbon::now()->subDays(5),
                'liters' => 75.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 1,
                'fuel_type' => 'Pertalite',
                'date' => Carbon::now()->subDays(6),
                'liters' => 40.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
