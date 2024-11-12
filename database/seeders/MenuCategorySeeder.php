<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Starters', 'Main Courses', 'Desserts', 'Drinks', 'Specials'];
        foreach ($categories as $category) {
            MenuCategory::create(['name' => $category]);
        }

        // Seed sub-categories with their respective category IDs
        $subCategories = [
            // Starters
            ['name' => 'Cold Starters', 'sub_category' => 1],
            ['name' => 'Hot Starters', 'sub_category' => 1],

            // Main Courses
            ['name' => 'Chicken Dishes', 'sub_category' => 2],
            ['name' => 'Beef Dishes', 'sub_category' => 2],
            ['name' => 'Seafood Dishes', 'sub_category' => 2],
            ['name' => 'Pasta Dishes', 'sub_category' => 2],

            // Desserts
            ['name' => 'Cakes & Pies', 'sub_category' => 3],
            ['name' => 'Ice Creams & Sorbets', 'sub_category' => 3],

            // Beverages
            ['name' => 'Alcoholic Drinks', 'sub_category' => 4],
            ['name' => 'Non-Alcoholic Drinks', 'sub_category' => 4],
            ['name' => 'Hot Beverages', 'sub_category' => 4],

            // Specials
            ['name' => 'Chef\'s Specials', 'sub_category' => 5],
            ['name' => 'Daily Specials', 'sub_category' => 5],
        ];
        foreach ($subCategories as $subCategory) {
            MenuCategory::create($subCategory);
        }
    }
}
