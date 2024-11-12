<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminGalleryController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM galleries");
        return view("pages.admin.insertEdit", ["table"=>"Galleries", "name" => "gallery", "columns"=>$columns, "action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        try {
            Gallery::create($data);
            return redirect()->route("admin.show", "galleries");
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
        $columns = DB::select("SHOW COLUMNS FROM galleries");
        $data = DB::table("galleries")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Galleries", "name" => "gallery", "columns"=>$columns, "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("galleries")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "galleries");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
