<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserHandbookContentTitle;
use App\Model\Frontend\UserInfo;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userPdfController extends Controller
{
    public function userPdfView(Request $request)
    {
        $data = UserHandbookContentTitle::where(['userHandbook_id' => $request->handbook_id, 'include' => '1'])->orderBy('order_by', 'asc')->get();
        $userInfo=UserInfo::where('user_id',Auth::guard('userList')->user()->id)->first();
//        return view('Backend.pages.project.pdf',compact('data'));
        $pdf = PDF::loadView('Frontend.userHandbook.userPdf', compact('data','userInfo'));
        return $pdf->stream();
    }

    public function userPdfDownload(Request $request)
    {
        $data = UserHandbookContentTitle::where(['userHandbook_id' => $request->handbook_id, 'include' => '1'])->orderBy('order_by', 'asc')->get();
        $userInfo=UserInfo::where('user_id',Auth::guard('userList')->user()->id)->first();
//        return view('Backend.pages.project.pdf',compact('data'));
        $pdf = PDF::loadView('Frontend.userHandbook.userPdf', compact('data','userInfo'));
        return $pdf->download();
    }
}
