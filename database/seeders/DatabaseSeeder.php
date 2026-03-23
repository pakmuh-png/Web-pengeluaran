<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pabrik;
use App\Models\Area;
use App\Models\Planner;
use App\Models\Pelanggan;
use App\Models\Material;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        Pabrik::factory(5)->create();
        Area::factory(10)->create();
        Planner::factory(5)->create();
        Pelanggan::factory(20)->create();
        Material::factory(50)->create();
        Order::factory(100)->create();
    }
}
