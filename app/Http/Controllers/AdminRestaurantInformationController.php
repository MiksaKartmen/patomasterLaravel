<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\RestaurantInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRestaurantInformationController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM restaurant_informations");
        $locations = DB::table("locations")->get();
        return view("pages.admin.insertEdit", ["table"=>"Restaurant Informations", "name" => "restaurantInformation", "columns"=>$columns, "options"=>$locations, "property"=>"state","action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            RestaurantInformation::create($data);
            return redirect()->route("admin.show", "restaurant_informations");
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
        $columns = DB::select("SHOW COLUMNS FROM restaurant_informations");
        $data = DB::table("restaurant_informations")->where("id",$id)->first();
        $locations = DB::table("locations")->get();

        return view("pages.admin.insertEdit", ["table"=>"Restaurant Information", "name" => "restaurantInformation", "columns"=>$columns, "options"=>$locations, "property"=>"state", "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("restaurant_informations")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "restaurant_informations");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
