<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()
        ->count(50)
        ->has(
            CarImage::factory()
            ->count(5)
            ->sequence(fn(Sequence $sequence) =>
            ['position' => $sequence->index % 5 + 1])
        ,'images')
        ->hasFeatures()
        ->create();
    }
}
