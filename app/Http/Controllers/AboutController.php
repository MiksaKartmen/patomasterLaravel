<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $employees = Employee::where("employee_role_id", 1)
            ->orWhere("employee_role_id", 2)
            ->join("employee_roles","employee_role_id", "employee_roles.id")
            ->select("employees.*", "employee_roles.name as role")
            ->get();
        return view("pages.about", ["employees"=>$employees]);
    }
}
