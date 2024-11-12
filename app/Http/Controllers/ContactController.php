<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdmin;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view("pages.contact");
    }

    public function submitContact(ContactRequest $request)
    {
        $name = $request->input("name");
        $surname = $request->input("surname");
        $email = $request->input("email");
        $msg = $request->input("message");

        try {
            Contact::create([
                "name"=>$name,
                "surname"=>$surname,
                "email"=>$email,
                "message"=>$msg
            ]);

            Mail::to('mihajlo.jovanovic.52.21@ict.edu.rs')->send(new \App\Mail\ContactAdmin($msg, $email));

            return back()->with('success-msg', "Thank you for your message. We will reply as soon as possible.");
        }
        catch (\Exception $e){
            return back()->with(["error-msg"=>$e->getMessage()]);
        }
    }
}
