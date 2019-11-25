<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\ProjectContentTitle;
use Illuminate\Http\Request;

class wordController extends Controller
{
    public function downloadWord($id){
        $data=ProjectContentTitle::where(['project_id'=>$id])->orderBy('order_by','asc')->get();
        return view('Backend.pages.project.word',compact('data'));

    }
}
