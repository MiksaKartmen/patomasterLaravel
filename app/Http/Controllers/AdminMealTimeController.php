<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\MealTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMealTimeController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM meal_times");
        return view("pages.admin.insertEdit", ["table"=>"Meal Times", "name" => "mealTime", "columns"=>$columns, "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            MealTime::create($data);
            return redirect()->route("admin.show", "meal_times");
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
        $columns = DB::select("SHOW COLUMNS FROM meal_times");
        $data = DB::table("meal_times")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Meal Times", "name" => "mealTime", "columns"=>$columns, "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("meal_times")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "meal_times");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
