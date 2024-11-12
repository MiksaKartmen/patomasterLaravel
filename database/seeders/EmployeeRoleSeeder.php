<?php

namespace Database\Seeders;

use App\Models\EmployeeRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeeRoles = [
            'Chef',
            'Sous Chef',
            'Baker',
            'Dishwasher',
            'Waiter',
            'Bartender',
            'Host',
            'Restaurant Manager',
            'Assistant Manager',
        ];

        foreach ($employeeRoles as $role){
            EmployeeRole::create([
                'name'=>$role
            ]);
        }

    }
}
