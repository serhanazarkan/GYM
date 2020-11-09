<?php

namespace App\Models\Blog;

use App\Models\User;
use App\Models\Blog\BlogPost;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    protected $appends = [
        "blog_posts",
        'user'
    ];

    public function blog_post(){
        return $this->hasMany(BlogPost::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getBlogPostsAttribute(){
        return $this->blog_post()->orderBy('created_at', 'asc')->get();
    }

    public function getUserAttribute()
    {
        return $this->user()->first();
    }

}
