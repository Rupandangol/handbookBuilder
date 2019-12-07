<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'editContentNo',
        'projectStatus',
        'project_created_by',
        'language',
        'category',
        'price'
    ];
}
