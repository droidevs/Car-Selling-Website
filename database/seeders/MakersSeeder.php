<?php

namespace Database\Seeders;

use App\Models\Maker;
use App\Models\Model;
use Illuminate\Database\Seeder;

class MakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makers = [
            "Toyota" => [
                "Camry", "Corolla", "Prius", "Yaris", "Supra", "Avalon",
                "Highlander", "RAV4", "4Runner", "Land Cruiser", "Tacoma", "Tundra"
            ],

            "Honda" => [
                "Civic", "Accord", "Fit", "Insight", "CR-V", "HR-V",
                "Pilot", "Odyssey", "Ridgeline"
            ],

            "Ford" => [
                "Mustang", "Fusion", "Focus", "Taurus", "Fiesta",
                "F-150", "Ranger", "Bronco", "Explorer", "Expedition"
            ],

            "Chevrolet" => [
                "Camaro", "Corvette", "Impala", "Malibu", "Cruze",
                "Tahoe", "Suburban", "Traverse", "Silverado", "Colorado"
            ],

            "Nissan" => [
                "Altima", "Sentra", "Maxima", "Versa",
                "Murano", "Rogue", "Pathfinder", "Armada",
                "Frontier", "Titan", "GT-R", "370Z"
            ],

            "BMW" => [
                "1 Series", "2 Series", "3 Series", "4 Series", "5 Series",
                "7 Series", "8 Series", "X1", "X3", "X5", "X7", "Z4", "M3", "M5"
            ],

            "Mercedes-Benz" => [
                "A-Class", "C-Class", "E-Class", "S-Class",
                "GLA", "GLC", "GLE", "GLS", "G-Class",
                "AMG GT"
            ],

            "Audi" => [
                "A3", "A4", "A5", "A6", "A7",
                "Q2", "Q3", "Q5", "Q7", "Q8",
                "S4", "RS6", "R8"
            ],

            "Volkswagen" => [
                "Golf", "Polo", "Passat", "Jetta", "Beetle",
                "Tiguan", "Touareg", "Arteon"
            ],

            "Hyundai" => [
                "Elantra", "Sonata", "Accent",
                "Kona", "Tucson", "Santa Fe", "Palisade"
            ],

            "Kia" => [
                "Rio", "Forte", "Optima", "Stinger",
                "Sportage", "Sorento", "Telluride"
            ],

            "Mazda" => [
                "Mazda3", "Mazda6", "CX-3", "CX-5", "CX-9", "MX-5 Miata"
            ],

            "Subaru" => [
                "Impreza", "Legacy", "Outback", "Forester", "Crosstrek", "BRZ"
            ],

            "Tesla" => [
                "Model S", "Model 3", "Model X", "Model Y", "Cybertruck", "Roadster"
            ],

            "Jeep" => [
                "Wrangler", "Compass", "Cherokee", "Grand Cherokee", "Renegade", "Gladiator"
            ],

            "Dodge" => [
                "Charger", "Challenger", "Durango", "Journey"
            ],

            "Lexus" => [
                "IS", "ES", "GS", "LS",
                "UX", "NX", "RX", "GX", "LX"
            ],

            "Porsche" => [
                "911", "718 Cayman", "718 Boxster", "Taycan",
                "Panamera", "Macan", "Cayenne"
            ],

            "Ferrari" => [
                "488", "812 Superfast", "Roma", "Portofino", "SF90 Stradale"
            ],

            "Lamborghini" => [
                "Huracán", "Aventador", "Urus"
            ],

            "Rolls-Royce" => [
                "Phantom", "Ghost", "Wraith", "Cullinan"
            ],

            "Bentley" => [
                "Continental GT", "Flying Spur", "Bentayga"
            ]
        ];

        foreach($makers as $maker => $models) {
            Maker::factory()
            ->state(['name' => $maker])
            ->has(
                Model::factory()
                ->count(count($models))
                ->sequence(...array_map(fn($model) => ['name' => $model], $models))
            )
            ->create();
        }
    }
}
