<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'date',
        'time',
        'people',
        'special_request',
        'table_id'
    ];
}
