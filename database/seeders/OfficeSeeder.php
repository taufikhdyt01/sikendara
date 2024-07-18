<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offices')->insert([
            [
                'name' => 'Kantor Pusat PT Nickel Mining',
                'type' => 'headquarters',
                'region' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kantor Cabang PT Nickel Mining',
                'type' => 'branch',
                'region' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
