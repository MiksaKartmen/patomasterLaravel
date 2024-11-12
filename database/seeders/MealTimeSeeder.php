<?php

namespace Database\Seeders;

use App\Models\MealTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mealTimes = [
            [
                'name' => 'Breakfast',
                'description' => 'Morning meal',
                'time_from' => '06:00:00',
                'time_to' => '10:00:00',
            ],
            [
                'name' => 'Brunch',
                'description' => 'Combination of breakfast and lunch',
                'time_from' => '10:00:00',
                'time_to' => '12:00:00',
            ],
            [
                'name' => 'Lunch',
                'description' => 'Midday meal',
                'time_from' => '12:00:00',
                'time_to' => '18:00:00',
            ],
            [
                'name' => 'Dinner',
                'description' => 'Evening meal',
                'time_from' => '18:00:00',
                'time_to' => '21:00:00',
            ],
        ];

        foreach ($mealTimes as $mealTimeData) {
            MealTime::create($mealTimeData);
        }
    }
}
