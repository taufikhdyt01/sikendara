<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mines')->insert([
            [
                'name' => 'Tambang Pomalaa',
                'region' => 'Sulawesi Tenggara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tambang Sorowako',
                'region' => 'Sulawesi Selatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tambang Obi',
                'region' => 'Maluku Utara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tambang Ransiki',
                'region' => 'Papua Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tambang Puruk Cahu',
                'region' => 'Kalimantan Tengah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tambang Muara Enim',
                'region' => 'Sumatra Selatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
