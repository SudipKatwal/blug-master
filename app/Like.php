<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function like()
    {
        return $this->belongsTo(User::class);
    }

    public function Dislike()
    {
        return $this->belongsTo(User::class);
    }
}
