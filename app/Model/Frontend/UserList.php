<?php

namespace App\Model\Frontend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserList extends Authenticatable
{
    protected $table = 'user_lists';
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
        'mobileNo',
        'reset_token'

    ];

    public function getUserInfo()
    {
        return $this->hasOne(
            'App\Model\Frontend\UserInfo',
            'user_id',
            'id'
        );
    }
}
