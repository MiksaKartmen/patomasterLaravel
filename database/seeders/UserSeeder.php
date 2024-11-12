<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            "name"=>"Mihajlo",
            "surname"=>"Jovanovic",
            "email"=>"mihajlojovanovic41@gmail.com",
            "password"=>Hash::make("Admin123"),
            "role_id"=>2
        ];

        User::create($user);
    }
}
