<?php

namespace App\Models\Blog;

use App\Models\Common\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'user',
        'blog',
        'category',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function category(){
        return $this->hasOne(BlogCategory::class);
    }

    public function image(){
        return $this->morphOne(Photo::class, 'content', 'model');
    }

    public function getUserAttribute(){
        return $this->user()->first();
    }

    public function getBlogAttribute(){
        return $this->blog()->first();
    }

    public function getCategoryAttribute(){
        return $this->category()->first();
    }

    public function getImageAttribute(){
        return @$this->image()->first();
    }
}
