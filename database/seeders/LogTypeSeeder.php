<?php

namespace Database\Seeders;

use App\Models\LogType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logTypes=[
            "register",
            "login",
            "logout",
            "reservation",
            "cancel reservation",
            "photo change",
            "profile update"
        ];

        foreach ($logTypes as $type){
            LogType::create([
                "name"=>$type
            ]);
        }

    }
}
