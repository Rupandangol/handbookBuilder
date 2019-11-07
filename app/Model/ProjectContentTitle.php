<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectContentTitle extends Model
{
    protected $table = 'project_content_titles';
    protected $fillable = [
        'contentTitle',
        'project_id',
        'order_by'
    ];

    public function getContent(){
        return $this->hasOne(
            'App\Model\ProjectContent',
            'title_id',
            'id'
        );
    }
}
