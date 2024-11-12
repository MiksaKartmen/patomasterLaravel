<?php

namespace App\Http\Controllers;

use App\Models\MealTime;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $query = MenuItem::with("price")
            ->join("prices", "menu_items.id", "menu_item_id")
             ->join("menu_categories", "menu_category_id", "menu_categories.id")
            ->select("price", "menu_items.id as item_id", "menu_categories.id as id", "menu_items.name as name", "menu_items.description", "menu_category_id", "sub_category", "menu_categories.name as category")
            ->distinct();


        $items = $query->paginate(10)->withQueryString();

        $categories = MenuCategory::whereNotNull("sub_category")->get();
        $mainCategories = MenuCategory::whereNull("sub_category")->get();
        $mealTimes = MealTime::all();
        return view("pages.menu", [
            "items" => $items,
            "categories" => $categories,
            "mainCategories" => $mainCategories,
            "mealTimes"=>$mealTimes
        ]);
    }

    public function filter(Request $request)
    {
        $search = $request->input('search');
        $mainCategoriesChb = $request->input('mainCatChb', []);
        $mealTimesChb = $request->input('mealTimeChb', []);
        $query = MenuItem::with("price")
            ->join("prices", "menu_items.id", "menu_item_id")
            ->join("menu_categories", "menu_category_id", "menu_categories.id")
            ->select("price", "menu_items.id as item_id", "menu_categories.id as id", "menu_items.name as name", "menu_items.description", "menu_category_id", "sub_category", "menu_categories.name as category")
            ->distinct();
        if ($search) {
            $query->where("menu_items.name", "LIKE", "%$search%");
        }
        if (!empty($mainCategoriesChb)) {
            $query->whereIn("sub_category", $mainCategoriesChb);
        }

        if (!empty($mealTimesChb)) {
            $query->join("menu_item_meal_times", "menu_items.id", "menu_item_meal_times.menu_item_id")
                ->join("meal_times", "meal_times.id", "meal_time_id");

            $query->whereIn("meal_times.id", $mealTimesChb);
        }

        $items = $query->paginate(10)->withQueryString();

        $categories = MenuCategory::whereNotNull("sub_category")->get();
        $mainCategories = MenuCategory::whereNull("sub_category")->get();
        $mealTimes = MealTime::all();
        return view("pages.menu", [
            "items" => $items,
            "categories" => $categories,
            "mainCategories" => $mainCategories,
            "mealTimes"=>$mealTimes
        ]);
    }

    public function show($id)
    {
        $menuItem = MenuItem::with("price")
            ->join("prices", "menu_items.id", "menu_item_id")
            ->join("menu_item_meal_times", "menu_items.id", "menu_item_meal_times.menu_item_id")
            ->join("meal_times", "meal_times.id", "meal_time_id")
            ->join("menu_categories", "menu_category_id", "menu_categories.id")
            ->where('menu_items.id',$id)
            ->select("price", "meal_times.*", "meal_times.name as meal_time", "meal_times.description as meal_time_description", "image", "menu_categories.name as category", "menu_items.name as name", "menu_items.description")
            ->first();

        return view("pages.single", ["item"=>$menuItem]);
    }

}
