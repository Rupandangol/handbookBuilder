<?php

namespace App\Http\Controllers;

use App\Model\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function FAQ()
    {
        $FAQ_active = 'active';
        $FAQ=FAQ::orderBy('id','desc')->get();
        return view('Frontend.FAQ.FAQ', compact('FAQ_active','FAQ'));
    }

    public function FAQView()
    {
        $FAQ = FAQ::orderBy('id','desc')->simplePaginate(10);
        return view('Backend.pages.FAQ.FAQView', compact('FAQ'));
    }

    public function FAQViewAddAction(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $data['question'] = $request->question;
        $data['answer'] = $request->answer;
        $data['adder'] = Auth::guard('admin')->user()->username;
        if ($request->FAQ_id) {
            FAQ::find($request->FAQ_id)->update($data);
            return redirect()->back()->with('success', 'Updated');

        }
        if (FAQ::create($data)) {
            return redirect()->back()->with('success', 'New FAQ Added');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

    public function FAQDelete($id)
    {
        FAQ::find($id)->delete();
        return redirect()->back()->with('fail','DELETED');
    }


}
