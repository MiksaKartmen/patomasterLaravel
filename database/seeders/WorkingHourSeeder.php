<?php

namespace Database\Seeders;

use App\Models\WorkingHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkingHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hours=["working_from"=>"9:30", "working_to"=>"21:00"];

        WorkingHour::create($hours);
    }
}
