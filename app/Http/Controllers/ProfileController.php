<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Reservation;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;
use Psy\Util\Json;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::where("users.id", $userId)
            ->join("user_images", function ($join) {
                $join->on("users.id", "=", "user_images.user_id")
                    ->whereRaw("user_images.created_at = (select max(created_at) from user_images where user_id = users.id)");
            })
            ->join("roles", "role_id", "roles.id")
            ->select("users.*", "users.id as userId", "user_images.*", "roles.name as role")
            ->first();
        $testimonial = Testimonial::where("user_id", $userId)->first();
        return view("pages.profile", ["user" => $user, "testimonial"=>$testimonial]);
    }

    public function photoUpdate(Request $request, $id)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/'), $imageName);
            UserImage::create([
                "src" => $imageName,
                "user_id" => $id
            ]);
            $user = User::where("id", $id)->first();
            Log::create([
                "message" => $user->email." has updated his photo.",
                "log_type_id" => 6,
                "date" => date("Y-m-d h:i:s")
            ]);

            return redirect()->route("profile");
        }
        catch (\Exception $e){
            return redirect()->back()->with(["error-msg"=>$e->getMessage()]);
        }

    }

    public function infoUpdate(Request $request, $id)
    {
        $user = User::where("id", $id)->first();
        $user->name = $request["name"];
        $user->surname = $request["surname"];
        $user->email = $request["email"];
        $user->save();

        Log::create([
            "message" => $user->email." has updated his profile info.",
            "log_type_id" => 7,
            "date" => date("Y-m-d h:i:s")
        ]);

        return redirect()->route("profile");
    }

    public function getReservations($email)
    {
        $reservations = Reservation::where("email", $email)
                        ->join("tables", "table_id", "tables.id")
                        ->select("reservations.*", "tables.name as table")
                        ->get();

        return Json::encode($reservations);
    }

    public function getInfo($id)
    {
        $user = User::where("id", $id)->first();

        return Json::encode($user);
    }
}
