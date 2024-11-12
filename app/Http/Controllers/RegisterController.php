<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Log;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view("pages.register");
    }

    public function register(RegisterRequest $request)
    {
        $name = $request->input("name");
        $surname = $request->input("surname");
        $email = $request->input("email");
        $password = $request->input("password");
        $cryptPass = Hash::make($password);
        try {
            $userId = DB::table("users")->insertGetId([
                "name"=>$name,
                "surname"=>$surname,
                "email"=>$email,
                "password"=>$cryptPass,
                "role_id"=>1
            ]);

            UserImage::create([
                "src"=>"default.png",
                "user_id"=>$userId
            ]);

            Log::create([
                "message" => $email." has registered",
                "log_type_id" => 1,
                "date" => date("Y-m-d h:i:s")
            ]);

            return redirect()->route('login');

        }
        catch (\Exception $e){
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

    }
}
