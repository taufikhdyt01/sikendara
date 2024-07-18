<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            [
                'type' => 'passenger',
                'number_plate' => 'B 1234 ABC',
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'owned_by' => 'company',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'freight',
                'number_plate' => 'L 5678 XYZ',
                'brand' => 'Isuzu',
                'model' => 'Elf',
                'owned_by' => 'company',
               'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'passenger',
                'number_plate' => 'B 5678 DEF',
                'brand' => 'Honda',
                'model' => 'Jazz',
                'owned_by' => 'rental',
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'freight',
                'number_plate' => 'B 6789 GHI',
                'brand' => 'Mitsubishi',
                'model' => 'Canter',
                'owned_by' => 'company',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'passenger',
                'number_plate' => 'D 4321 JKL',
                'brand' => 'Nissan',
                'model' => 'X-Trail',
                'owned_by' => 'company',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
