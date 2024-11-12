<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function restaurant_information()
    {
        return $this->hasMany(RestaurantInformation::class);
    }

    protected $fillable = [
        'state',
        'city',
        'street',
        'street_number',
        'floor'
    ];
}
