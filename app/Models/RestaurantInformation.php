<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantInformation extends Model
{
    use HasFactory;
    protected $table = 'restaurant_informations';
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    protected $fillable = [
        'email',
        'phone',
        'location_id',
    ];
}
