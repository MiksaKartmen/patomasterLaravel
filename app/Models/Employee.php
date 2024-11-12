<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function employee_role()
    {
        return $this->belongsTo(EmployeeRole::class);
    }

    protected $fillable = [
        'name',
        'surname',
        'biography',
        'image',
        'employee_role_id'
    ];

}
