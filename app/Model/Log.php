<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $fillable = [
        'admin_name',
        'activity',
        'category_name',
        'content_title_name'
    ];
}
