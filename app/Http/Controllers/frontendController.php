<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class frontendController extends Controller
{
    public function dashboard()
    {
        return view('Frontend.dashboard');
    }

    public function userInfoForm()
    {
        $data['userInfo'] = UserInfo::where('user_id', Auth::guard('userList')->user()->id)->first();
        if (!$data) {
            $data = [];
        }
        return view('Frontend.userInfo', $data);
    }

    public function userInfoFormAction(Request $request)
    {
        $request->validate([
            'companyName' => 'required',
            'no_of_employee' => 'required',
            'workShift' => 'required',
            'no_of_sickLeave' => 'required',
            'holiday' => 'required',
        ]);

        $data['companyName'] = $request->companyName;
        $data['no_of_employee'] = $request->no_of_employee;
        $data['workShift'] = $request->workShift;
        $data['no_of_sickLeave'] = $request->no_of_sickLeave;
        $data['holiday'] = $request->holiday;
        $data['user_id'] = Auth::guard('userList')->user()->id;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extension = strtolower($logo->extension());
            $newName = $request->companyName . time() . '_.' . $extension;
            Image::make($logo)->save(public_path('/uploads/UserLogo/' . $newName));
            $data['logo'] = $newName;
        }
        if (UserInfo::where('user_id', $data['user_id'])->first()) {
            if (UserInfo::where('user_id', $data['user_id'])->first()->update($data)) {
                return redirect(route('handbookList'))->with('success', 'User Info Form Updated');
            }
        } else {
            if (UserInfo::create($data)) {
                return redirect(route('handbookList'))->with('success', 'User Info Form Added');
            }
        }


        return redirect()->back()->with('fail', 'Failed');
    }

}
