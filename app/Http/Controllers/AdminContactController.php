<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContactController extends Controller
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
         $columns = DB::select("SHOW COLUMNS FROM contacts");
        return view("pages.admin.insertEdit", ["table"=>"Contacts", "name" => "contact", "columns"=>$columns, "action"=>"insert"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $columns = DB::select("SHOW COLUMNS FROM contacts");
        $data = DB::table("contacts")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"Contacts", "name" => "contact", "columns"=>$columns, "data"=>$data,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except("_token", "_method");
        DB::table("contacts")->where("id",$id)->update($data);
        return redirect()->route("admin.show", "contacts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
