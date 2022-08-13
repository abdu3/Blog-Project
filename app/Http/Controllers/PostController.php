<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Rule\Exists;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return view('posts');
    }
    public function getPost($id){
        //  find a post by its slug and pass it to a view called 'post'

         return view('post',['post'=>Post::findOrFail($id)]);
    }

        ///  find post using route-model binding ///

    public function findPost(Post $post){
        //  find a post by its slug and pass it to a view called 'post'

         return view('post',['post'=>$post]);
    }




    public  function getAll(){

        return view('posts',[
            'posts'=>Post::latest()->Filter(request(['search','author']))->paginate(6),
            "categories"=>Category::all()
        ]);
    }


    public function store(Request $request){

       $attributes=$request->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>"required",
            'thumbnail'=> 'required|image',
            'category_id'=>'required'
        ]);

        $attributes["user_id"]=auth()->id();
        $attributes["thumbnail"]=request()->file('thumbnail')->store('thumbnails');

        // return  $attributes["thumbnail"];
        Post::create($attributes);

        return redirect('/posts')->with('success','Your Post and published has been created.');  // session()->flash('success','Your account has been created.');
    }





}



    // public  function getAll(){

    //     // Debug query in database for solve n+1 problem

    //     \Illuminate\Support\Facades\DB::Listen(function($query){
    //             logger($query->sql,$query->bindings);
    //     });
    //     return view('posts',[
    //         'posts'=>Post::all()
    //     ]);
    // }

