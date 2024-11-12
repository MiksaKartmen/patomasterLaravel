<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLocationController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM locations");
        return view("pages.admin.insertEdit", ["table"=>"Locations", "name" => "location", "columns"=>$columns, "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            Location::create($data);
            return redirect()->route("admin.show", "locations");
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
        $columns = DB::select("SHOW COLUMNS FROM locations");
        $data = DB::table("locations")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Locations", "name" => "location", "columns"=>$columns, "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("locations")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "locations");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
