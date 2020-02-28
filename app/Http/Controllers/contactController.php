<?php

namespace App\Http\Controllers;

use App\Model\ContactUsViewed;
use App\Model\Frontend\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactController extends Controller
{
//    main page Ajax contact

    public function contactMainPage(Request $request)
    {
        $data['fullName'] = $request->fullName;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        if (ContactUs::create($data)) {
            return response()->json(1);
        }
        return response()->json(0);
    }


    public function contact()
    {
        $contact_active = 'active';
        return view('Frontend.contact.contact', compact('contact_active'));
    }

    public function contactAction(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data['fullName'] = Auth::guard('userList')->user()->username;
        $data['email'] = Auth::guard('userList')->user()->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        if (ContactUs::create($data)) {
            return redirect()->back()->with('success', 'Message Sent');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

//    Backend
    public function contactReview()
    {
        $contactReview = ContactUs::orderBy('id', 'desc')->simplePaginate(15);
        $contactView = ContactUsViewed::where(['admin_id' => Auth::guard('admin')->user()->id])->first();
        return view('Backend.pages.contactReview.contactReview', compact('contactReview'));
    }

    public function contactViewed(Request $request)
    {
        $contactUs_id = $request->contact_id;
        $admin_id = Auth::guard('admin')->user()->id;
        if (!ContactUsViewed::where(['contactUs_id' => $contactUs_id, 'admin_id' => $admin_id])->first()) {

            ContactUsViewed::create(['contactUs_id' => $contactUs_id, 'admin_id' => $admin_id]);
        }

        return response()->json('1');
    }


}
