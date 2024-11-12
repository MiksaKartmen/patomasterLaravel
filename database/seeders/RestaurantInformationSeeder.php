<?php

namespace Database\Seeders;

use App\Models\RestaurantInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=1;$i<6;$i++){
            RestaurantInformation::create([
               "email"=>$faker->email(),
                "phone"=>$faker->phoneNumber(),
                "location_id"=>$i,
            ]);
        }
    }
}
