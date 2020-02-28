<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserHandbook;
use App\Model\Frontend\UserHandbookContent;
use App\Model\Frontend\UserHandbookContentTitle;
use App\Model\Frontend\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userBackendController extends Controller
{
    public function userList()
    {
        $userList_active='active';
        $data['userList'] = UserList::all();
        return view('Backend.pages.user.userList', $data,compact('userList_active'));
    }

    public function userInfo($id)
    {
        $userList_active='active';
        $data['userLoginData'] = UserList::find($id);
        $data['projects'] = UserHandbook::where(['user_id' => $id])->get();
        if ($data['userLoginData']->getUserInfo) {
            return view('Backend.pages.user.userInfo', $data,compact('userList_active'));
        }
        return redirect()->back()->with('fail', 'Form not submitted');
    }

    public function userProject($id)
    {
        $userList_active='active';
        $data['handbook'] = UserHandbook::find($id);
        return view('Backend.pages.user.userProject.userProject', $data,compact("userList_active"));

    }

    public function deleteCodeChange(Request $request)
    {
        $handbook = UserHandbook::find($request->handbook_id);
        if ($handbook->deleteCode === '0') {
            $handbook->deleteCode = '1';
        } else {
            $handbook->deleteCode = '0';
        }
        $handbook->save();
        return response()->json($handbook->deleteCode);
    }

    public function userProjectContent($id)
    {
        $userList_active='active';

        $userProjectContent = UserHandbookContent::where('handbook_title_id', $id)->first();
        $title = UserHandbookContentTitle::find($id);
        $userProjectContentTitle = UserHandbookContentTitle::where('userHandbook_id', $title->userHandbook_id)->orderBy('order_by', 'asc')->get();
        return view('Backend.pages.user.userProject.userProjectContent', compact('userProjectContent', 'userProjectContentTitle','userList_active'));
    }

    public function userProjectContentSave(Request $request, $id)
    {
        $userProjectContent = UserHandbookContent::where('handbook_title_id', $id)->first();
        $userProjectTitle = UserHandbookContentTitle::find($id);
        $userProjectContent['handbook_content'] = $request->handbook_content;
        $userProjectContent->save();
        return redirect(route('userProject', $userProjectTitle->userHandbook_id))->with('success', 'Content Saved');
    }

//Update Content Title
    public function updateUserContentTitle(Request $request)
    {
        $contentTitle = UserHandbookContentTitle::find($request->contentTitle_id);
        $contentTitle->handbookContentTitle = $request->contentTitle;
        $contentTitle->save();
        return response()->json($contentTitle['handbookContentTitle']);
    }


}
