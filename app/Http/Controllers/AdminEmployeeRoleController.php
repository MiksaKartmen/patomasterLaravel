<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Employee;
use App\Models\EmployeeRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEmployeeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $columns = DB::select("SHOW COLUMNS FROM employee_roles");

        return view("pages.admin.insertEdit", ["table"=>"Employee Roles", "name" => "employeeRole", "columns"=>$columns, "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();

        try {
            EmployeeRole::create($data);
            return redirect()->route("admin.show", "employee_roles");
        }
        catch (\Exception $e){
            return redirect()->back()->with(["error-msg"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $columns = DB::select("SHOW COLUMNS FROM employee_roles");
        $data = DB::table("employee_roles")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Employee Roles", "name" => "employeeRole", "columns"=>$columns, "data"=>$data ,"action"=>"update"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("employee_roles")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "employee_roles");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
