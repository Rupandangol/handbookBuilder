<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table='contact_us';
    protected $fillable=[
        'fullName',
        'email',
        'subject',
        'message',
    ];

    public function getViewed(){
        return $this->hasMany(
          'App\Model\ContactUsViewed',
          'contactUs_id',
          'id'
        );
    }

}
