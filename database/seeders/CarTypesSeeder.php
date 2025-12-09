<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        CarType::factory()
        ->sequence(
            ['name' => 'Sedan'],
            ['name' => 'Hatchback'],
            ['name' => 'SUV'],
            ['name' => 'Pickup Truck'],
            ['name' => 'Minivan'],
            ['name' => 'Jeep'],
            ['name' => 'Coupe'],
            ['name' => 'Crossover'],
            ['name' => 'Sports Car']
        )
        ->count(9)
        ->create();
    }
}
