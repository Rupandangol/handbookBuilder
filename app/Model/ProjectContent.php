<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectContent extends Model
{
    protected $table='project_contents';
    protected $fillable=[
        'myProjectContent',
        'title_id'
    ];
}
