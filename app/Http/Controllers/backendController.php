<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\Model\Frontend\UserList;
use App\Model\Log;
use App\Model\Project;
use App\Model\ProjectContent;
use App\Model\ProjectContentTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class backendController extends Controller
{
    public function dashboard()
    {
        $data['project'] = Project::all();
        $data['admin'] = Admin::all();
        $data['user_list'] = UserList::all();
        $data['dashboard_active'] = 'active';
        return view('Backend.pages.dashboard', $data);

    }

    public function addAdmin()
    {
        $addAdmin_active = 'active';
        $admin_active = 'active';
        return view('Backend.pages.admin.addAdmin', compact('addAdmin_active', 'admin_active'));
    }

    public function addAdminAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'password' => 'required|confirmed',
            'privileges' => 'required'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['privileges'] = $request->privileges;
        $data['status'] = 0;
        if (Admin::create($data)) {
            return redirect(route('manageAdmin'));
        }
        return redirect()->back();
    }

    public function manageAdmin()
    {
        $admin = Admin::all();
        $manageAdmin_active = 'active';
        $admin_active = 'active';

        return view('Backend.pages.admin.manageAdmin', compact('admin', 'manageAdmin_active', 'admin_active'));
    }

    public function deleteAdmin($id)
    {
        Admin::find($id)->delete();
        return redirect()->back()->with('fail', 'Admin Deleted');
    }

    public function updateAdmin($id)
    {
        $admin = Admin::find($id);
        return view('Backend.pages.admin.updateAdmin', compact('admin'));
    }

    public function updateAdminAction(Request $request, $id)
    {
        $request->validate([
            'username' => "required|min:4|unique:admins,username,$id",
            'email' => "required|unique:admins,email,$id",
            'password' => 'required',
            'privileges' => 'required'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['privileges'] = $request->privileges;
        $data['password'] = bcrypt($request->password);
        if (Admin::find($id)->update($data)) {
            return redirect(route('manageAdmin'))->with('success', 'Updated');

        }
        return redirect()->back()->with('fail', 'Failed');

    }

    public function projectLists()
    {
        $projectLists = Project::all();
        return view('Backend.pages.project.projectLists', compact('projectLists'));
    }


    public function newProject(Request $request)
    {
        $request->validate([
            'projectName' => 'required|unique:projects,projectName'
        ]);
        $data['projectName'] = $request->projectName;
        $data['editContentNo'] = 1;
        $data['project_created_by'] = Auth::guard('admin')->user()->username;
        $data['projectStatus'] = 0;
        if ($newProject = Project::create($data)) {
            $id = $newProject->id;
            $item['admin_name']=$data['project_created_by'];
            $item['activity']='Created';
            $item['project_name']=$data['projectName'];
            Log::create($item);
//            return redirect(route('projectContent', $id));
            return redirect()->back()->with('success', 'Created');
        }
        return redirect()->back()->with('fail', 'Failed');
    }

    public function projectContent($id)
    {
        $data['projectTitle'] = Project::find($id);
        $data['contentTitle'] = ProjectContentTitle::where(['project_id' => $id])->orderBy('order_by', 'asc')->get();
        return view('Backend.pages.project.projectContent', $data);
    }

    public function projectContentTitle(Request $request)
    {

        $request->validate([
            'contentTitle' => 'required'
        ]);
        $data['contentTitle'] = $request->contentTitle;
        $data['project_id'] = $request->project_id;
        $data['order_by'] = ProjectContentTitle::where(['project_id' => $data['project_id']])->get()->count() + 1;

        if (ProjectContentTitle::create($data)) {

            return redirect()->back()->with('success', 'Title Added');
        }
        return redirect()->back()->with('fail', 'failed');
    }

    public function updateProjectContentTitle(Request $request)
    {
        $request->validate([
            'contentTitle' => 'required'
        ]);
        $data['contentTitle'] = $request->contentTitle;
        $data['project_id'] = $request->project_id;
        $data['order_by'] = $request->order_by;

        ProjectContentTitle::find($request->id)->update(($data));
        return redirect()->back()->with('success', 'Updated');
    }

    public function myContent($id)
    {
        $data['title'] = ProjectContentTitle::find($id);
        $data['myContent'] = ProjectContent::where(['title_id' => $id])->first();
        return view('Backend.pages.project.projectContent.myContent', $data);
    }

    public function myContentAction(Request $request)
    {
        $request->validate([
            'myProjectContent' => 'required'
        ]);
        $project_id = ProjectContentTitle::find($request->title_id)->getProject->id;

        $data['title_id'] = $request->title_id;
        $data['myProjectContent'] = $request->myProjectContent;


        if (ProjectContent::where(['title_id' => $data['title_id']])->first()) {
            ProjectContent::where(['title_id' => $data['title_id']])->first()->update($data);
            return redirect(route('projectContent', $project_id))->with('success', 'Content Updated');
        } else {
            if (ProjectContent::create($data)) {
                return redirect(route('projectContent', $project_id))->with('success', 'Content Added');
            }
        }
    }

    public function contentUp($id)
    {
        $clickedValue = ProjectContentTitle::find($id);
        $clickedOrderNo = $clickedValue->order_by;

        if ($clickedOrderNo != '1') {
            $upValue = ProjectContentTitle::where(['order_by' => $clickedOrderNo - 1])->where(['project_id' => $clickedValue->project_id])->first();
            $upValue->order_by = $upValue->order_by + 1;
            $clickedValue->order_by = $clickedValue->order_by - 1;
            $upValue->save();
            $clickedValue->save();
        }
        return redirect()->back();
    }

    public function contentDown($id)
    {
        $clickedValue = ProjectContentTitle::find($id);
        $myCount = ProjectContentTitle::where(['project_id' => $clickedValue->project_id])->get()->count();
        $clickedOrderNo = $clickedValue->order_by;
        if ($clickedOrderNo != $myCount) {
            $upValue = ProjectContentTitle::where(['order_by' => $clickedOrderNo + 1])->where(['project_id' => $clickedValue->project_id])->first();
            $upValue->order_by = $upValue->order_by - 1;
            $clickedValue->order_by = $clickedValue->order_by + 1;
            $upValue->save();
            $clickedValue->save();
        }
        return redirect()->back();
    }


    public function contentDelete($id)
    {
        $clickedValue = ProjectContentTitle::find($id);
        $clickedOrderNo = $clickedValue->order_by;
        $myCount = ProjectContentTitle::where(['project_id' => $clickedValue->project_id])->get()->count();
        $loopNo = $myCount - $clickedOrderNo;
        for ($i = 1; $i <= $loopNo; $i++) {
            $changedValue = ProjectContentTitle::where(['project_id' => $clickedValue->project_id])->where(['order_by' => $clickedOrderNo + $i])->first();
            $changedValue->order_by = $changedValue->order_by - 1;
            $changedValue->save();
        }
        ProjectContentTitle::find($id)->delete();
        return redirect()->back();
    }


    public function userList()
    {
        $data['userList'] = UserList::all();
        return view('Backend.pages.user.userList', $data);
    }


    public function deleteProject(Request $request)
    {
        $data = Project::find($request->project_id);
        $projectName = $data->projectName;
        $data->delete();
        $item['admin_name']=Auth::guard('admin')->user()->username;
        $item['activity']='Deleted';
        $item['project_name']=$projectName;
        Log::create($item);
        return redirect(route('projectLists'))->with('fail', 'Project "' . $projectName . '" is Deleted');
    }


}
