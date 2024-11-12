<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $columns = DB::select("SHOW COLUMNS FROM menu_items");
        $categories = DB::table("menu_categories")->whereNotNull("sub_category")->get();

        return view("pages.admin.insertEdit", ["table"=>"Menu Items", "name" => "menuItem", "columns"=>$columns, "options"=>$categories, "property"=>"name","action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $imageName = time() . '.' . $request->image->extension();
        try {
            $request->image->move(public_path('assets/images/'), $imageName);
            MenuItem::create($data + ["image"=>$imageName]);
            return redirect()->route("admin.show", "menu_items");
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
        $columns = DB::select("SHOW COLUMNS FROM menu_items");
        $data = DB::table("menu_items")->where("id",$id)->first();
        $categories = DB::table("menu_categories")->whereNotNull("sub_category")->get();

        return view("pages.admin.insertEdit", ["table"=>"Menu Items", "name" => "menuItem", "columns"=>$columns, "options"=>$categories, "property"=>"name", "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method", "image");
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/'), $imageName);
        DB::table("menu_items")->where("id",$id)->update($data+["image"=>$imageName]);
        return redirect()->route("admin.show", "menu_items");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
