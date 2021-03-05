<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Determine if the user is admin
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == "admin";
    }
    public function userInfo(){
        return $this->hasOne(UserInfo::class);
    }
    public function pendingRequest(){
        return $this->hasOne(PendingRequest::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function postLike(){
        return $this->hasMany(Postlike::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function thread()
    {
        return $this->hasMany(Thread::class);
    }
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
}
