<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Employee;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminGalleryImageController extends Controller
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
        $columns = DB::select("SHOW COLUMNS FROM gallery_images");
        $galleries = DB::table("galleries")->get();
        return view("pages.admin.insertEdit", ["table"=>"Gallery Images", "name" => "galleryImage", "columns"=>$columns, "options"=>$galleries, "property"=>"title", "action"=>"insert"]);

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
            GalleryImage::create($data + ["src"=>$imageName,]);
            return redirect()->route("admin.show", "gallery_images");
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
        $columns = DB::select("SHOW COLUMNS FROM gallery_images");
        $data = DB::table("gallery_images")->where("id",$id)->first();
        $galleries = DB::table("galleries")->get();
        return view("pages.admin.insertEdit", ["table"=>"Gallery Images", "name" => "galleryImage", "columns"=>$columns, "options"=>$galleries, "property"=>"title", "data"=>$data ,"action"=>"update"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->except("_token", "_method", "image");
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/'), $imageName);

        DB::table("gallery_images")->where("id",$id)->update($data+["image"=>$imageName]);
        return redirect()->route("admin.show", "gallery_images");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
