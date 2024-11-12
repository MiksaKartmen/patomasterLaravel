<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request, $id)
    {
        Testimonial::create([
            "text"=>$request["testimonial-msg"],
            "rating"=>$request["rating"],
            "date"=>date("Y-m-d"),
            "user_id"=>$id
        ]);
        return redirect()->route("profile");
    }
}
