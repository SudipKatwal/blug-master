<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','body','thumbnail','words_count','user_id','category_id','main_keywords','lsi_keywords','is_approved','is_resubmitted'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function resubmission()
    {
        return $this->hasMany(Resubmission::class);
    }
}
