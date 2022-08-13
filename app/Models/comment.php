<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable =[
        "user_id",
        "post_id",
        "body"
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
