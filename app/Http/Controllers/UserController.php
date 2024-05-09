<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class UserController extends Controller{

    public function login(){
        if(View::exists('auth.index')){
            return view('auth.index');
        }else{
            return abort(404);
        }
    }
    

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        
        if(auth()->attempt($validated)){
            $user = auth()->user();
    
            // Check if the user is marked as deleted
            if ($user->isDeleted == 1) {
                auth()->logout(); // Log out the user
                return back()->withErrors(['email' => 'Your account has been deleted. Please contact support for assistance.'])->onlyInput('email');
            }
    
            $request->session()->regenerate();
    
            return redirect('/dashboard')->with('message', 'Welcome Back!');
        }
    
        //return back()->withErrors(['email' => 'Login failed'])->onlyInput('email');
    }
}
