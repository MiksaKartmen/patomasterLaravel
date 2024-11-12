<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
          'All photos',
          'Interior',
          'Food',
          'Events',
          'Vip guests'
        ];

        foreach ($galleries as $gallery){
            Gallery::create([
                'title'=>$gallery
            ]);
        }
    }
}
