<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resubmission extends Model
{
    protected $fillable = ['post_id','reasons'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
