<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserHandbookContent extends Model
{
    protected $table = 'user_handbook_contents';
    protected $fillable = [
        'handbook_content',
        'handbook_title_id'
    ];

    public function hbContentTitleFromContent()
    {
        return $this->hasOne(
            'App\Model\Frontend\UserHandbookContentTitle',
            'id',
            'handbook_title_id'
        );
    }
}
