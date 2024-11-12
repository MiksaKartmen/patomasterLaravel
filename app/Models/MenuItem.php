<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    public function meal_time()
    {
        return $this->belongsToMany(MealTime::class,"menu_item_meal_times");
    }

    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }

    protected $fillable = [
        'name',
        'description',
        'image',
        'menu_category_id',
    ];
}
