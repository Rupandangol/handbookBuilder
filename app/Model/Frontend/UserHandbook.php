<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserHandbook extends Model
{
    protected $table = 'user_handbooks';
    protected $fillable = [
        'category',
        'editContentNo',
        'language',
        'price',
        'deleteCode',
        'user_id'
    ];

    public function getHandbookContentTitle()
    {
        return $this->hasMany(
            'App\Model\Frontend\UserHandbookContentTitle',
            'userHandbook_id',
            'id'
        );
    }
}
