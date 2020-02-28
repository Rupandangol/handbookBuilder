<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'f_a_q_s';
    protected $fillable = [
        'question',
        'answer',
        'adder',
    ];
}
