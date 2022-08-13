<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'excerpt',
        'body',
        'thumbnail',
        'published_at',
        'category_id',
        'user_id'
    ];

    protected $hidden=[
        'created_at',
    ];

    protected $with =["Category",'author'];



    public function scopeFilter($query, array $fillters){

        $query->when($fillters['search'] ??false ,fn($query,$search) =>
            $query->where('title','like', '%' . $search.'%')
            ->orWhere('excerpt','like', '%' . $search.'%')
            ->orWhere('body','like', '%' . $search.'%'));

        // $query->when($fillters['category'] ??false ,fn($query,$category) =>
        //     $query->whereHas('category',fn()=>$where('id',$category)));
        $query->when($fillters['author'] ?? false ,fn($query,$author) =>
            $query->whereHas('author',fn($query)=>$query->where('id',$author)));

    }

        /**
         * Get the Category that owns the Post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function Category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        /**
         * Get the Author that owns the Post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function author(): BelongsTo
        {
            return $this->belongsTo(User::class,'user_id');
        }

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
}
