<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class LawyerAppointment extends Model
{
    protected $table = 'lawyer_appointments';
    protected $fillable = [
        'user_id',
        'userHandbook_id',
        'lawyer_id'
    ];

    public function getAUser()
    {
        return $this->hasOne(
            'App\Model\Frontend\UserList',
            'id',
            'user_id'
        );
    }

    public function getALawyer()
    {
        return $this->hasOne(
            'App\Model\Admin',
            'id',
            'lawyer_id'
        );
    }
}
