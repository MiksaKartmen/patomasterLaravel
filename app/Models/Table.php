<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    protected $fillable = [
        'name',
        'capacity',
    ];
}
