<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public  function getAllByAuthor(User $author){

        // dd($author);

        return view('posts',[
            'posts'=>$author->posts,
            "categories"=>Category::all()
        ]);
    }
}
