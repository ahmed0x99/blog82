<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function displayLogin(){
        return view("test-auth.login");
    }

    public function login(Request $request){

        // dd( $request->except('email', 'password') );
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->guard('admin')->attempt($credentials)) {
            // Authentication passed...
            
            return redirect()->intended('/test');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
