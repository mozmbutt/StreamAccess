<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property false|mixed|string metric
 * @property false|mixed|string intermediate
 * @property false|mixed|string bachelors
 * @property false|mixed|string masters
 * @property false|mixed|string phd
 * @property mixed user_info_id
 */
class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';

    public function userInfo(){
        return $this->belongsTo(UserInfo::class);
    }
}
