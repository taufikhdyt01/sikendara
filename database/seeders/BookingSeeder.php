<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'driver_id' => 1,
                'vehicle_id' => 1,
                'mine_id' => 1,
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(5),
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_id' => 2,
                'vehicle_id' => 2,
                'mine_id' => 2,
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->addDays(10),
                'status' => 'rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_id' => 3,
                'vehicle_id' => 3,
                'mine_id' => 3,
                'start_date' => Carbon::now()->subDays(3),
                'end_date' => Carbon::now()->addDays(3),
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_id' => 4,
                'vehicle_id' => 4,
                'mine_id' => 4,
                'start_date' => Carbon::now()->subDays(8),
                'end_date' => Carbon::now()->addDays(8),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}