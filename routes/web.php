<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\AdminPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class,'getAll']);


// Route::get('post/{post}',[PostController::class ,'getPost'])->where('post','[A-z_/-]+');
// Route::get('post/{id}',[PostController::class ,'getPost']);

// route-model binding

Route::get('post/{post}',[PostController::class ,'findPost']);

Route::get('categories/{category}',[CategoryController::class ,'findCategory']);
Route::get('author/{author}',[AuthorController::class ,'getAllByAuthor']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest')->name('register');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionController::class,'create'])->middleware('guest')->name('login');
Route::post('login',[SessionController::class,'store'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::post('post/{post:id}/comment',[PostCommentController::class,'store'])->middleware('auth');


Route::group(["prefix"=>"admin","middleware"=>"admin"],function(){

    Route::Post('post/',[PostController::class,'store'])->name('post.store');

    Route::get('posts/create',[AdminPostController::class,'create'])->name('post.create');
    Route::get('posts/',[AdminPostController::class,'index']);

    Route::get('posts/{post}/edit',[AdminPostController::class,'edit'])->name('post.edit');
    Route::patch('posts/{post}',[AdminPostController::class,'update'])->name('post.update');

    Route::delete('posts/{post}',[AdminPostController::class,'destroy'])->name('post.delete');

});

