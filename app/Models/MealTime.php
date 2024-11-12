<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealTime extends Model
{
    use HasFactory;

    public function menu_item()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    protected $fillable = [
        'name',
        'description',
        'time_from',
        'time_to',
    ];
}
