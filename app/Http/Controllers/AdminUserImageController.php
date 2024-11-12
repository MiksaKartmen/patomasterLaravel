<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserImageController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM user_images");
        $users = DB::table("users")->get();
        return view("pages.admin.insertEdit", ["table"=>"User Images", "name" => "userImage", "columns"=>$columns, "options"=>$users, "property"=>"email","action"=>"insert"]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $imageName = time() . '.' . $request->src->extension();
        try {
            $request->src->move(public_path('assets/images/'), $imageName);
            UserImage::create($data + ["src"=>$imageName]);
            return redirect()->route("admin.show", "user_images");
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
        $columns = DB::select("SHOW COLUMNS FROM user_images");
        $users = DB::table("users")->get();
        $data = DB::table("users")->where("id",$id)->first();
        return view("pages.admin.insertEdit", ["table"=>"User Images", "name" => "userImage", "columns"=>$columns, "options"=>$users, "data"=>$data, "property"=>"email","action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method", "image");
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/'), $imageName);

        DB::table("user_images")->where("id",$id)->update($data+["image"=>$imageName]);
        return redirect()->route("admin.show", "user_images");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
