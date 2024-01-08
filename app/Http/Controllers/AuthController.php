<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view("auth.create");
    }
    public function store(Request $request)
    {
        //validating the login request
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);

        $credentials = $request->only("email","password");//returns an array with the values
        $remember = $request->filled("remember");//returns true if the box is checked else returns false
    
        //we try to authenticate using the fascades inbuilt Auth which has an attempt method
        //the method takes the array of credentials as a parameter and a remember which is a boolean value
        if(Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with("error","Invalid Credentials");
        }
    }
    public function destroy(string $id)
    {
        //
    }
}
