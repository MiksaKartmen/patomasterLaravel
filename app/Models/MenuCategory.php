<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    public function menu_item()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function sub_category()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    protected $fillable = [
        'name',
        'sub_category',
    ];
}
