<?php

namespace App\Http\Controllers;

use App\Models\MealTime;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::whereNotNull("image")
            ->join("menu_categories", "menu_category_id", "menu_categories.id")
            ->select("menu_items.*", "menu_categories.name as category")
            ->distinct()
            ->get()
            ->unique('category') // Ensuring uniqueness based on the unique identifier (e.g., ID)
            ->random(6);

        $testimonials = Testimonial::join("users", "user_id", "users.id")
                                    ->join("user_images", function ($join) {
                                        $join->on("users.id", "=", "user_images.user_id")
                                            ->whereRaw("user_images.created_at = (select max(created_at) from user_images where user_id = users.id)");
                                    })->get();

        return view("pages.home", ["items"=>$menuItems, "testimonials" => $testimonials]);
    }
}
