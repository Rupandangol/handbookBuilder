<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\ProjectContentTitle;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function deleteProject(Request $request)
    {
        $id = $request->project_id;
        Project::find($id)->delete();
        return response()->json($id);
    }

    public function editContentNo(Request $request)
    {
        $project_id=$request->project_id;
        $editContent=Project::find($project_id);
        if($editContent->editContentNo==='1'){
            $editContent->editContentNo='0';
        }else{
            $editContent->editContentNo='1';
        }
        $editContent->save();

        return response()->json($editContent);
    }
    public function updateProject(Request $request){
//
        $project_id=$request->project_id;
        $project=Project::find($project_id);
        $project->projectName=$request->project_name;
        $project->save();
        return response()->json($request->project_name);

    }

}
