<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LawyerProfile extends Model
{
    protected $table = 'lawyer_profiles';
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'email',
        'contactNumber',
        'about',
        'lawyer_id',
        'image'
    ];
}
