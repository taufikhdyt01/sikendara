<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprovalSeeder extends Seeder
{
    public function run()
    {
        DB::table('approvals')->insert([
            [
                'booking_id' => 1,
                'user_id' => 2,
                'level' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 1,
                'user_id' => 3,
                'level' => 2,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 2,
                'user_id' => 3,
                'level' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 2,
                'user_id' => 4,
                'level' => 2,
                'status' => 'rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 3,
                'user_id' => 2,
                'level' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 3,
                'user_id' => 3,
                'level' => 2,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 3,
                'user_id' => 4,
                'level' => 3,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 4,
                'user_id' => 2,
                'level' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 4,
                'user_id' => 4,
                'level' => 2,
                'status' => 'process',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
