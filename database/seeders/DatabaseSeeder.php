<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OfficeSeeder::class,
            MineSeeder::class,
            UserSeeder::class,
            VehicleSeeder::class,
            DriverSeeder::class,
            BookingSeeder::class,
            ApprovalSeeder::class,
            FuelConsumptionSeeder::class,
            ServiceSeeder::class
        ]);
    }
}
