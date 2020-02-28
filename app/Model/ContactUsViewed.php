<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUsViewed extends Model
{
    protected $table = 'contact_us_vieweds';
    protected $fillable = [
        'contactUs_id',
        'admin_id'
    ];
}
