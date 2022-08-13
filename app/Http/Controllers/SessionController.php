<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.login');
    }

    public function store()
    {
        // validate the request
        $attribute=request()->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        //  attempt to authenticate and log in the user
        // based on the provided credentials
        if(auth()->attempt($attribute)) {

            session()->regenerate();
            // redirect with a session flash message
             return redirect('/posts')->with('success','Welcome Back!');
        }

        // auht field

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

        // other way

        // return back()
        //         ->withInput()
        //         ->withErrors([  'email' => 'Your provided credentials could not be verified.']);

    }

    public function destroy(){


        auth()->logout();

        return redirect("/posts")->with('success',"goodbye!");
    }
}
