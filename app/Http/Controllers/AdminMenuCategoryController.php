<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMenuCategoryController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM menu_categories");
        $sub_categories = DB::table("menu_categories")->whereNull("sub_category")->get();
        return view("pages.admin.insertEdit", ["table"=>"Menu Categories", "name" => "menuCategory", "columns"=>$columns, "options"=>$sub_categories, "property"=>"name", "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            MenuCategory::create($data);
            return redirect()->route("admin.show", "menu_categories");
        }
        catch (\Exception $e){
            dd($e);
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
        $columns = DB::select("SHOW COLUMNS FROM menu_categories");
        $data = DB::table("menu_categories")->where("id",$id)->first();
        $sub_categories = DB::table("menu_categories")->whereNull("sub_category")->get();
        return view("pages.admin.insertEdit", ["table"=>"Menu Categories", "name" => "menuCategory", "columns"=>$columns, "options"=>$sub_categories, "property"=>"name", "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("menu_categories")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "menu_categories");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
