<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Budi Santoso',
                'email' => 'admin@nickelmining.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'position' => 'Pengelola Kendaraan',
                'office_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agus Setiawan',
                'email' => 'agus@nickelmining.com',
                'password' => Hash::make('password'),
                'role' => 'approver',
                'position' => 'Manajer',
                'office_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi Sartika',
                'email' => 'dewi@nickelmining.com',
                'password' => Hash::make('password'),
                'role' => 'approver',
                'position' => 'Kepala Operasi',
                'office_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aisyah',
                'email' => 'siti@nickelmining.com',
                'password' => Hash::make('password'),
                'role' => 'approver',
                'position' => 'Manajer',
                'office_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
