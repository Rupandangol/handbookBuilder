<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'projectName',
        'editContentNo',
        'projectStatus',
        'project_created_by'
    ];
}
