<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\Frontend\UserList;
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
        $project_id = $request->project_id;
        $editContent = Project::find($project_id);
        if ($editContent->editContentNo === '1') {
            $editContent->editContentNo = '0';
        } else {
            $editContent->editContentNo = '1';
        }
        $editContent->save();

        return response()->json($editContent);
    }

    public function updateProject(Request $request)
    {
//
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $project->category = $request->category;
        $project->save();
        return response()->json($request->category);

    }

    public function projectStatus(Request $request)
    {
        $data = Project::find($request->project_id);
        if ($data->projectStatus === '1') {
            $data->projectStatus = '0';
        } else {
            $data->projectStatus = '1';
        }
        $data->save();
        return response()->json($data->projectStatus);
    }

    public function adminStatus(Request $request)
    {
        $data = Admin::find($request->admin_id);
        if ($data->status === '1') {
            $data->status = '0';
        } else {
            $data->status = '1';
        }
        $data->save();
        return response()->json($data->status);
    }

    public function userStatus(Request $request){
         $data=UserList::find($request->user_id);
         if($data->status==='1'){
             $data->status='0';
         }else{
             $data->status='1';
         }
         $data->save();
         return response()->json($data->status);
    }
}
