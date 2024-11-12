<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $images = GalleryImage::all();
        return view("pages.gallery", ["galleries" => $galleries, 'images'=>$images]);
    }

    public function show($id)
    {
        if($id == 1){
            $images = GalleryImage::all();
        }
        else{
            $images = GalleryImage::where("gallery_id", $id)->get();
        }

        return json_encode($images);
    }
}
