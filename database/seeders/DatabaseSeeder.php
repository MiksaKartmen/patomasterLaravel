<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LogType;
use App\Models\MealTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           EmployeeRoleSeeder::class,
           EmployeeSeeder::class,
            GallerySeeder::class,
            LocationSeeder::class,
            MealTimeSeeder::class,
            MenuCategorySeeder::class,
            MenuItemsSeeder::class,
            NavigationSeeder::class,
            PriceSeeder::class,
            RestaurantInformationSeeder::class,
            RoleSeeder::class,
            TableSeeder::class,
            UserSeeder::class,
            WorkingHourSeeder::class,
            MenuItemMealTimesSeeder::class,
            LogTypeSeeder::class
        ]);
    }
}
