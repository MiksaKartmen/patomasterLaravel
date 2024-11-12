<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navigations = [
            [
                'href'=>'home',
                'title'=>'Home'
            ],
            [
                'href'=>'menu',
                'title'=>'Menu'
            ],
            [
                'href'=>'reservation',
                'title'=>'Reservation'
            ],
            [
                'href'=>'gallery',
                'title'=>'Gallery'
            ],
            [
                'href'=>'about',
                'title'=>'About'
            ],
            [
                'href'=>'blog',
                'title'=>'Blog'
            ],
            [
                'href'=>'contact',
                'title'=>'Contact'
            ]
        ];

        foreach ($navigations as $nav){
            Navigation::create($nav);
        }
    }
}
