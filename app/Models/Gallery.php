<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function gallery_image()
    {
        return $this->hasMany(GalleryImage::class);
    }

    protected $fillable = [
        'title',
    ];
}
