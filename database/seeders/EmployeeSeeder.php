<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0;$i<20;$i++){
            Employee::create([
               'name'=>$faker->firstName(),
               'surname'=>$faker->lastName(),
                'employee_role_id'=>rand(1,9)
            ]);
        }
    }
}
