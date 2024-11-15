<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1;$i<16;$i++){
            Table::create([
               "name"=>"Table".$i,
               "capacity"=>rand(2,12)
            ]);
        }
    }
}
