<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        

        // $user = User::factory()->create(['name'=>'']);
            Post::factory(10)->create();
        // Category::factory(5)->create();



    //    $work=Category::create([
    //        'name'=>'Work',
    //        'slug'=>'work'
    //    ]);

    //    $personal =Category::create([
    //        'name'=>'Personal',
    //        'slug'=>'personal'
    //    ]);

    //    $family = Category::create([
    //        'name'=>'Family',
    //        'slug'=>'family'
    //    ]);

    //    Post::create([
    //        'user_id'=> $user->id,
    //        'category_id'=>$family->id,
    //        'title'=>'My Family Post ',
    //        'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    //        'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt sapiente, nihil, enim corrupti inventore molestiae voluptate quisquam, dolores non vitae accusantium molestias nulla dolore officiis magnam eligendi ex optio. Vero?'

    //    ]);
    //    Post::create([
    //        'user_id'=> $user->id,
    //        'category_id'=>$personal->id,
    //        'title'=>'My Family Post ',
    //        'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    //        'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt sapiente, nihil, enim corrupti inventore molestiae voluptate quisquam, dolores non vitae accusantium molestias nulla dolore officiis magnam eligendi ex optio. Vero?'

    //    ]);
    //    Post::create([
    //        'user_id'=> $user->id,
    //        'category_id'=>$work->id,
    //        'title'=>'My Family Post ',
    //        'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
    //        'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt sapiente, nihil, enim corrupti inventore molestiae voluptate quisquam, dolores non vitae accusantium molestias nulla dolore officiis magnam eligendi ex optio. Vero?'

    //    ]);

    }
}
