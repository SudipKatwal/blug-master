<?php

namespace App;

use App\Mail\EmailVerification;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'email', 'password','address','phone_no','gender','interest','thumbnails','bio','balance'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($user){
                $user->verification_token = mt_rand(100000,999999);
                $user->token_created_at = Carbon::now();
            }
        );
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function assignPost()
    {
        return $this->hasMany(AssignPost::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
