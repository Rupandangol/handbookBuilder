<?php

namespace App\Http\Controllers;


use App\Mail\lawyerMail;
use App\Model\Frontend\LawyerAppointment;
use App\Model\Frontend\UserHandbook;
use App\Model\Frontend\UserInfo;
use App\Model\Frontend\UserList;
use App\Model\LawyerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;


class lawyerController extends Controller
{
//    Backend


    public function lawyerProfile()
    {
        if (Auth::guard('admin')->user()->privileges === 'Lawyer') {
            $lawyerProfile = LawyerProfile::where('lawyer_id', Auth::guard('admin')->user()->id)->first() ?? '';
            $lawyerProfile_active = 'active';
            return view('Backend.pages.LawyerProfile.lawyerProfile', compact('lawyerProfile_active', 'lawyerProfile'));
        }
        return redirect()->back();
    }

    public function lawyerProfileAction(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'about' => 'required'
        ]);
        $data['firstName'] = $request->firstName;
        $data['middleName'] = $request->middleName;
        $data['lastName'] = $request->lastName;
        $data['email'] = $request->email;
        $data['about'] = $request->about;
        $data['contactNumber'] = $request->contactNumber;
        $data['lawyer_id'] = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = strtolower(($file->extension()));
            $newName = $request->firstName . time() . '_.' . $extension;
            Image::make($file)->save(public_path('/uploads/userImage/' . $newName));
            $data['image'] = $newName;
        }

        if ($check = LawyerProfile::where('lawyer_id', $data['lawyer_id'])->first()) {
            if ($check->update($data)) {
                return redirect(route('lawyerProfileView'))->with('success', 'Profile Saved');
            }
            return redirect()->back()->with('error', 'Error');
        } else {
            if (LawyerProfile::create($data)) {
                return redirect(route('lawyerProfileView'))->with('success', 'Profile Saved');
            }
        }
        return redirect()->back()->with('error', 'Error');
    }


    public function lawyerProfileView()
    {
        if (Auth::guard('admin')->user()->privileges === 'Lawyer') {
            $lawyerProfile = LawyerProfile::where('lawyer_id', Auth::guard('admin')->user()->id)->first() ?? '';
            $lawyerProfile_active = 'active';
            return view('Backend.pages.LawyerProfile.lawyerProfileView', compact('lawyerProfile_active', 'lawyerProfile'));
        }
        return redirect()->back();

    }

//    Frontend


    public function lawyerVerification($lawyer_id, $userHandbook_id)
    {
        $lawyerProfile = LawyerProfile::find($lawyer_id);
        $handbook = UserHandbook::find($userHandbook_id);
        return view('Frontend.lawyer.lawyerGetVerified', compact('handbook', 'lawyerProfile'));
    }

    public function lawyerBookAppointment(Request $request)
    {
        $userHandbook = UserHandbook::find($request->userHandbook_id);
        $user = UserList::find($userHandbook->user_id);
        $companyName = UserInfo::where(['user_id' => $user->id])->first()->companyName;
        $lawyer = LawyerProfile::where('lawyer_id', $request->lawyer_id)->first();
        $lawyerName = $lawyer->firstName;
        $user_id = $user->id;
        Mail::to($lawyer->email)->send(new lawyerMail($companyName, $lawyerName, $user_id));
        LawyerAppointment::create(['user_id' => $user_id, 'lawyer_id' => $request->lawyer_id, 'userHandbook_id' => $request->userHandbook_id]);
        return redirect(route('handbookContentTitle', $userHandbook->id))->with('success', 'Email has been sent to the Lawyer, He/She will contact you as soon as possible.');
    }


}

