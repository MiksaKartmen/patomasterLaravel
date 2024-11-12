<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM users");
        $roles = DB::table("roles")->get();
        return view("pages.admin.insertEdit", ["table"=>"Users", "name" => "user", "columns"=>$columns, "options"=>$roles, "property"=>"name","action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->except("password");
        $password = $request->input("password");
        try {
            User::create($data+["password"=>Hash::make($password)]);
            return redirect()->route("admin.show", "users");
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
        $columns = DB::select("SHOW COLUMNS FROM users");
        $roles = DB::table("roles")->get();
        $data = DB::table("users")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Users", "name" => "user", "columns"=>$columns, "options"=>$roles, "data"=>$data,"property"=>"name","action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("users")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "users");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
