<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $states = [
            'Michigan', 'Missouri', 'Montana', 'New Hampshire', 'New Jersey'
        ];

        for ($i=0;$i<5;$i++){
            Location::create([
               'state'=>$states[rand(0,4)],
                'city'=>$faker->city(),
                'street'=>$faker->streetName(),
                'street_number'=>rand(1,99),
                'floor'=>rand(1,20),
            ]);
        }
    }
}
