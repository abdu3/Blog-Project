<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

         ///  find Categories using route-model binding ///

         public function findCategory(Category $category){
            //  find a post by its slug and pass it to a view called 'post'

             return view('posts',[
             'posts'=>$category->posts()->paginate(3),
             "currentCategory"=>$category,
             "categories"=>Category::all()

        ]);
        }

}
