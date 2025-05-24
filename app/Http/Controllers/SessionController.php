<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view ('auth.login');
    }

    public function store(){
        //validate
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //attempt to log in the user
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials is not match'
            ]);
        }
        // Auth::attempt($attributes);
        //regenerate the session token
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs')->with('success', 'Login successfully');    
    }
    public function destroy(){
        auth::logout();
        return redirect('/')->with('success', 'Logout successfully');
    }
}
