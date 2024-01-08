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
    public function destroy()
    {
        //loggin out the user by using the logout method in the Auth Fascade
        Auth::logout();

        //we need to destroy or invalidate the data of the user who is logging out
        //so we use the session and invalidate the total session
        request()->session()->invalidate();

        //we need to regenerate the crsf token after the user logs out as all the forms loaded must be made unavailable to submit after the user logs out
        request()->session()->regenerateToken();

        //we return back to the homepage after logging out
        return redirect('/');
    }
}
