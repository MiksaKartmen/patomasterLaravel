<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPriceController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM prices");
        $items = DB::table("menu_items")->get();
        return view("pages.admin.insertEdit", ["table"=>"Prices", "name" => "price", "columns"=>$columns, "options"=>$items, "property"=>"name","action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            Price::create($data);
            return redirect()->route("admin.show", "prices");
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
        $columns = DB::select("SHOW COLUMNS FROM prices");
        $data = DB::table("prices")->where("id",$id)->first();
        $items = DB::table("menu_items")->get();

        return view("pages.admin.insertEdit", ["table"=>"Prices", "name" => "price", "columns"=>$columns, "options"=>$items, "property"=>"name", "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("prices")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "prices");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
