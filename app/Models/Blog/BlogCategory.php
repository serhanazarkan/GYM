<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['blog_posts'];

    public function blog_post(){
        return $this->hasMany(BlogPost::class, 'category_id', 'id');
    }

    public function getBlogPostsAttribute(){
        return $this->blog_post()->orderBy('created_at', 'asc')->get();
    }
}
