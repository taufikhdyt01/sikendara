<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            [
                'name' => 'Joko Susilo',
                'status' => 'assigned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Rahayu',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agus Salim',
                'status' => 'assigned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jaya Kusuma',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
