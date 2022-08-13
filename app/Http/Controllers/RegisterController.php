<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create(){
        return view('register.create');
    }
    public function store(){
        // validate user request data
        $validate= request()->validate([
            'name'=> 'required|min:6|max:20',
            'email'=>'required|max:255|email|unique:users,email',
            'password'=>'required|min:7'     // we use Eloquent mutators way  to hash password
        ]);

        // hashing the password 1 way

        // $validate['password']=bcrypt($validate['password']);

        // save user to database
       $user= User::create($validate);

       // login user

       auth()->login($user);

        // retrun to home page after saveing data
        return redirect('/posts')->with('success','Your account has been created.');  // session()->flash('success','Your account has been created.');


    }
}
