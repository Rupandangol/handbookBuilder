<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserHandbook;
use App\Model\Frontend\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userBackendController extends Controller
{
    public function userList()
    {
        $data['userList'] = UserList::all();
        return view('Backend.pages.user.userList', $data);
    }

    public function userInfo($id)
    {
        $data['userLoginData'] = UserList::find($id);
        $data['projects'] = UserHandbook::where(['user_id' => $id])->get();
        if ($data['userLoginData']->getUserInfo) {
            return view('Backend.pages.user.userInfo', $data);
        }
        return redirect()->back()->with('fail', 'Form not submitted');
    }

    public function userProject($id)
    {
        $data['handbook'] = UserHandbook::find($id);
        return view('Backend.pages.user.userProject.userProject', $data);

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
}
