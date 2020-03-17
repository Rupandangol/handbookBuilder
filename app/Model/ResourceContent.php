<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResourceContent extends Model
{
    protected $table = 'resource_contents';
    protected $fillable = [
        'title',
        'resources',
        'image'
    ];
}
