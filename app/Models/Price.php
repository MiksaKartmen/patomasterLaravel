<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public function price()
    {
        return $this->belongsTo(MenuItem::class, "menu_item_id");
    }

    protected $fillable = [
        'price',
        'menu_item_id',
    ];
}
