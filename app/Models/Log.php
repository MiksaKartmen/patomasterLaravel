<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public function log_type()
    {
        return $this->belongsTo(LogType::class);
    }

    protected $fillable = [
        'message',
        'log_type_id',
        'date'
    ];
}
