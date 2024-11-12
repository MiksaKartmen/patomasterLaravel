<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.login");
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = User::where('email', $email)->first();
        if(!$user){
            return redirect()->back()->with(['error-msg'=>'No user found!']);
        }
        if(!Hash::check($password, $user->password)){
            return redirect()->back()->with(['error-msg' => 'Wrong password!']);
        }
        Auth::login($user);
        Log::create([
            "message" => "User ".$user->email." has logged in",
            "log_type_id" => 2,
            "date" => date("Y-m-d h:i:s")
        ]);
        return redirect()->route('home');

    }

    public function logout(){
        $user = Auth::user();
        Log::create([
            "message" => "User ".$user->email." has logged out",
            "log_type_id" => 3,
            "date" => date("Y-m-d h:i:s")
        ]);
        Auth::logout();
        return redirect()->back();
    }
}
