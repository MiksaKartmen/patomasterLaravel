<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNavigationController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM navigations");
        return view("pages.admin.insertEdit", ["table"=>"Navigations", "name" => "navigation", "columns"=>$columns, "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            Navigation::create($data);
            return redirect()->route("admin.show", "navigations");
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
        $columns = DB::select("SHOW COLUMNS FROM navigations");
        $data = DB::table("navigations")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Navigations", "name" => "navigation", "columns"=>$columns, "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("navigations")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "navigations");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
