<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    use HasFactory;
    protected $dates = ['updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function postLike()
    {
        return $this->hasMany(Postlike::class);
    }
    
    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('M d, Y');
    }
    public function getUpdatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('M d, Y H:i:s');
    }
}
