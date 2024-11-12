<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemMealTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItemsMealTimes = [
            // Cold Starters
            1 => [1, 3], // Caprese Salad
            2 => [1, 2], // Tuna Tartare
            3 => [3, 4], // Shrimp Cocktail

            // Hot Starters
            4 => [3, 4], // Garlic Bread
            5 => [1, 3], // Stuffed Mushrooms
            6 => [3, 4], // Calamari Fritti
            7 => [1, 2], // Spinach Artichoke Dip

            // Chicken Dishes
            8 => [3, 4], // Grilled Chicken Caesar Salad
            9 => [3, 4], // Chicken Marsala

            // Beef Dishes
            10 => [3, 4], // Filet Mignon
            11 => [3, 4], // Beef Stroganoff
            12 => [3, 4], // Grilled Ribeye Steak

            // Seafood Dishes
            13 => [3, 4], // Grilled Salmon
            14 => [3, 4], // Shrimp Scampi

            // Pasta Dishes
            15 => [3, 4], // Spaghetti Carbonara
            16 => [3, 4], // Fettuccine Alfredo

            // Cakes & Pies
            17 => [3, 4], // New York Cheesecake
            18 => [3, 4], // Key Lime Pie

            // Ice Creams & Sorbets
            19 => [3, 4], // Vanilla Bean Ice Cream
            20 => [3, 4], // Strawberry Sorbet

            // Alcoholic Drinks
            21 => [3, 4], // Margarita
            22 => [3, 4], // Old Fashioned

            // Non-Alcoholic Drinks
            23 => [1, 2], // Virgin Mojito
            24 => [1, 2], // Freshly Squeezed Orange Juice

            // Hot Beverages
            25 => [1, 2], // Cappuccino
            26 => [1, 2], // Chai Latte

            // Chef's Specials
            27 => [3, 4], // Signature Beef Burger
            28 => [3, 4], // Vegetarian Buddha Bowl
            29 => [3, 4], // Seafood Paella
            30 => [3, 4], // Lamb Tagine
            31 => [3, 4], // Vegetable Pad Thai

            // Daily Specials
            32 => [3, 4], // Soup of the Day
            33 => [3, 4], // Grilled Vegetable Panini
            34 => [3, 4], // Quiche Lorraine
            35 => [3, 4], // Braised Short Ribs
            36 => [3, 4], // Penne alla Vodka
        ];

        foreach ($menuItemsMealTimes as $itemId => $mealTimeIds) {
            $menuItem = MenuItem::find($itemId);
            if ($menuItem) {
                $menuItem->meal_time()->attach($mealTimeIds);
            }
        }
    }
}
