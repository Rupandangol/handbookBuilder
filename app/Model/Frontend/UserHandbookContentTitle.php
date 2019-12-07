<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserHandbookContentTitle extends Model
{
    protected $table='user_handbook_content_titles';
    protected $fillable=[
        'handbookContentTitle',
        'userHandbook_id',
        'include',
        'order_by'
    ];

    public function hbContentFromContentTitle(){
        return $this->hasOne(
            'App\Model\Frontend\UserHandbookContent',
            'handbook_title_id',
            'id'
        );
    }

    public function hbFromContentTitle()
    {
        return $this->hasOne(
            'App\Model\Frontend\UserHandbook',
            'id',
            'userHandbook_id'
        );
    }
}
