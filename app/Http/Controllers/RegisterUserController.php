<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
  public function create(){
    return view("auth.register");
  }

  public function store(){
    // validate
   $attribute = request()->validate([
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:5|confirmed',
    ]);
    //create user
    $user = User::create($attribute);
    // log the user in
    Auth::login($user);
    // redirect
    return redirect('/jobs');
  }
}
