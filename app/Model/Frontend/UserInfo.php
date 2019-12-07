<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos';
    protected $fillable = [
        'companyName',
        'no_of_employee',
        'logo',
        'workShift',
        'no_of_sickLeave',
        'holiday',
        'user_id'
    ];
}
