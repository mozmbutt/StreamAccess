<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|mixed|string|null user_id
 * @property mixed first_name
 * @property mixed last_name
 */
class UserInfo extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function education()
    {
        return $this->hasOne(Education::class);
    }
    public function skill()
    {
        return $this->hasMany(Skill::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
}
