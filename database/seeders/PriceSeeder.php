<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=1;$i<37;$i++){
            Price::create([
                "price"=>$faker->randomFloat(2, 10, 99),
                "menu_item_id"=>$i
            ]);
        }
    }
}
