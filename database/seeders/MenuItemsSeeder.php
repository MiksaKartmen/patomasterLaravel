<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            // Cold Starters
            [
                'name' => 'Caprese Salad',
                'description' => 'Fresh tomatoes, mozzarella cheese, basil, olive oil, and balsamic glaze.',
                'menu_category_id' => 6,
            ],
            [
                'name' => 'Tuna Tartare',
                'description' => 'Fresh tuna mixed with avocado, lime juice, and soy sauce, served with crispy wonton chips.',
                'menu_category_id' => 6,
            ],
            [
                'name' => 'Shrimp Cocktail',
                'description' => 'Chilled shrimp served with cocktail sauce and lemon wedges.',
                'menu_category_id' => 6,
            ],

            // Hot Starters
            [
                'name' => 'Garlic Bread',
                'description' => 'Toasted bread with garlic butter, parsley, and parmesan cheese.',
                'menu_category_id' => 7,
            ],
            [
                'name' => 'Stuffed Mushrooms',
                'description' => 'Mushroom caps filled with a mixture of cream cheese, garlic, herbs, and breadcrumbs, baked until golden brown.',
                'menu_category_id' => 7,
            ],
            [
                'name' => 'Calamari Fritti',
                'description' => 'Crispy fried calamari served with marinara sauce and lemon wedges.',
                'menu_category_id' => 7,
            ],
            [
                'name' => 'Spinach Artichoke Dip',
                'description' => 'Creamy dip made with spinach, artichokes, cream cheese, and parmesan, served with tortilla chips.',
                'menu_category_id' => 7,
            ],

            // Chicken Dishes
            [
                'name' => 'Grilled Chicken Caesar Salad',
                'description' => 'Grilled chicken breast served on a bed of romaine lettuce with croutons, parmesan cheese, and Caesar dressing.',
                'menu_category_id' => 8,
            ],
            [
                'name' => 'Chicken Marsala',
                'description' => 'Pan-seared chicken breasts in a savory Marsala wine sauce with mushrooms, served with roasted potatoes.',
                'menu_category_id' => 8,
            ],

            // Beef Dishes
            [
                'name' => 'Filet Mignon',
                'description' => 'Tender filet mignon steak grilled to perfection, served with mashed potatoes and asparagus.',
                'menu_category_id' => 9,
            ],
            [
                'name' => 'Beef Stroganoff',
                'description' => 'Tender strips of beef cooked with mushrooms, onions, and sour cream sauce, served over egg noodles.',
                'menu_category_id' => 9,
            ],
            [
                'name' => 'Grilled Ribeye Steak',
                'description' => 'Juicy ribeye steak seasoned and grilled to your preference, served with garlic butter and steamed vegetables.',
                'menu_category_id' => 9,
            ],

            // Seafood Dishes
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh salmon fillet seasoned and grilled, served with lemon butter sauce and wild rice pilaf.',
                'menu_category_id' => 10,
            ],
            [
                'name' => 'Shrimp Scampi',
                'description' => 'Sauteed shrimp in garlic butter sauce with white wine, lemon juice, and parsley, served over linguine pasta.',
                'menu_category_id' => 10,
            ],

            // Pasta Dishes
            [
                'name' => 'Spaghetti Carbonara',
                'description' => 'Classic Italian pasta dish with pancetta, eggs, Parmesan cheese, and black pepper.',
                'menu_category_id' => 11,
            ],
            [
                'name' => 'Fettuccine Alfredo',
                'description' => 'Creamy Alfredo sauce with fettuccine pasta, served with grilled chicken or shrimp.',
                'menu_category_id' => 11,
            ],

            // Cakes & Pies
            [
                'name' => 'New York Cheesecake',
                'description' => 'Classic creamy cheesecake with graham cracker crust, topped with berry compote.',
                'menu_category_id' => 12,
            ],
            [
                'name' => 'Key Lime Pie',
                'description' => 'Refreshing key lime pie with graham cracker crust, topped with whipped cream.',
                'menu_category_id' => 12,
            ],

            // Ice Creams & Sorbets
            [
                'name' => 'Vanilla Bean Ice Cream',
                'description' => 'Creamy vanilla ice cream made with real vanilla beans.',
                'menu_category_id' => 13,
            ],
            [
                'name' => 'Strawberry Sorbet',
                'description' => 'Refreshing sorbet made with ripe strawberries, lemon juice, and sugar, served in a chilled glass.',
                'menu_category_id' => 13,
            ],

            // Alcoholic Drinks (ID: 14)
            [
                'name' => 'Margarita',
                'description' => 'Classic cocktail made with tequila, triple sec, lime juice, and agave syrup, served on the rocks with a salted rim.',
                'menu_category_id' => 14,
            ],
            [
                'name' => 'Old Fashioned',
                'description' => 'Timeless cocktail made with bourbon whiskey, sugar, bitters, and a twist of citrus zest, served over ice.',
                'menu_category_id' => 14,
            ],

            // Non-Alcoholic Drinks (ID: 15)
            [
                'name' => 'Virgin Mojito',
                'description' => 'Refreshing mocktail made with muddled mint leaves, lime juice, simple syrup, and soda water, served over ice.',
                'menu_category_id' => 15,
            ],
            [
                'name' => 'Freshly Squeezed Orange Juice',
                'description' => 'Juicy oranges freshly squeezed into a refreshing citrus drink, served over ice.',
                'menu_category_id' => 15,
            ],

            // Hot Beverages (ID: 16)
            [
                'name' => 'Cappuccino',
                'description' => 'Classic Italian espresso-based coffee drink made with equal parts espresso, steamed milk, and milk foam, dusted with cocoa powder.',
                'menu_category_id' => 16,
            ],
            [
                'name' => 'Chai Latte',
                'description' => 'Spiced tea latte made with black tea, steamed milk, and a blend of aromatic spices, topped with foam.',
                'menu_category_id' => 16,
            ],

            // Chef's Specials (ID: 17)
            [
                'name' => 'Signature Beef Burger',
                'description' => 'Juicy beef patty topped with melted cheddar cheese, crispy bacon, caramelized onions, lettuce, tomato, and pickles, served on a brioche bun with fries.',
                'menu_category_id' => 17,
            ],
            [
                'name' => 'Vegetarian Buddha Bowl',
                'description' => 'Nourishing bowl filled with quinoa, roasted vegetables, avocado, chickpeas, and tahini dressing.',
                'menu_category_id' => 17,
            ],
            [
                'name' => 'Seafood Paella',
                'description' => 'Traditional Spanish rice dish cooked with saffron, shrimp, clams, mussels, chorizo, and vegetables.',
                'menu_category_id' => 17,
            ],
            [
                'name' => 'Lamb Tagine',
                'description' => 'Tender lamb stew cooked with Moroccan spices, dried fruits, and preserved lemons, served with couscous.',
                'menu_category_id' => 17,
            ],
            [
                'name' => 'Vegetable Pad Thai',
                'description' => 'Stir-fried rice noodles with tofu, bean sprouts, green onions, peanuts, and tamarind sauce, garnished with lime and cilantro.',
                'menu_category_id' => 17,
            ],

            // Daily Specials (ID: 18)
            [
                'name' => 'Soup of the Day',
                'description' => 'Chef\'s daily selection of homemade soup, served with freshly baked bread.',
                'menu_category_id' => 18,
            ],
            [
                'name' => 'Grilled Vegetable Panini',
                'description' => 'Grilled sandwich filled with marinated grilled vegetables, pesto sauce, and melted mozzarella cheese, served with a side salad.',
                'menu_category_id' => 18,
            ],
            [
                'name' => 'Quiche Lorraine',
                'description' => 'Savory pastry filled with bacon, cheese, and eggs, baked until golden brown, served with mixed greens.',
                'menu_category_id' => 18,
            ],
            [
                'name' => 'Braised Short Ribs',
                'description' => 'Tender beef short ribs slow-cooked in red wine sauce with root vegetables, served with mashed potatoes.',
                'menu_category_id' => 18,
            ],
            [
                'name' => 'Penne alla Vodka',
                'description' => 'Penne pasta tossed in creamy tomato vodka sauce with pancetta, onions, and Parmesan cheese.',
                'menu_category_id' => 18,
            ],
        ];

        foreach ($menuItems as $item){
            MenuItem::create($item);
        }

    }
}
