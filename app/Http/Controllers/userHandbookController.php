<?php

namespace App\Http\Controllers;

use App\Model\Frontend\LawyerAppointment;
use App\Model\Frontend\UserHandbook;
use App\Model\Frontend\UserHandbookContent;
use App\Model\Frontend\UserHandbookContentTitle;
use App\Model\Frontend\UserInfo;
use App\Model\Frontend\UserList;
use App\Model\LawyerProfile;
use App\Model\Project;
use App\Model\ProjectContentTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userHandbookController extends Controller
{
    public function handbookList()
    {
        $handbookList_active = 'active';
        $project = Project::where(['projectStatus' => '1'])->distinct('category')->pluck('category');
        $handbook = UserHandbook::where(['user_id' => Auth::guard('userList')->user()->id, 'deleteCode' => '0'])->get();
        return view('Frontend.userHandbook.handbookList', compact('project', 'handbook', 'handbookList_active'));
    }

    public function fetchLanguage(Request $request)
    {
        $myCategory = $request->myCategory;
        $myLanguage = Project::where(['projectStatus' => '1', 'category' => $myCategory])->distinct('language')->pluck('language');
        foreach ($myLanguage as $value) {
            $language = $value;
            $output[] = "<option value='$language'>" . $language . "</option>";
        }
        return response()->json($output);
    }


    public function selectUserHandbook(Request $request)
    {
        if ($request->category === 'empty' || $request->language === 'empty') {
            return redirect()->back()->with('fail', 'Choose Correctly');
        }
        $project = Project::where(['projectStatus' => '1', 'category' => $request->category, 'language' => $request->language])->first();
        $projectPrice = Project::where(['projectStatus' => '1', 'category' => $request->category, 'language' => $request->language])->get();
        if ($project) {
            return view('Frontend.userHandbook.getUserHandbook', compact('project', 'projectPrice'));
        } else {
            return redirect()->back()->with('fail', 'Failed');
        }
    }


    public function createUserHandbook(Request $request)
    {
        $myCategory = $request->category;
        $myLanguage = $request->language;
//        $myPrice = $request->price;
        if ($project = Project::where(['category' => $myCategory, 'language' => $myLanguage, 'price' => 'Free'])->first()) {
            $projectContentTitle = ProjectContentTitle::where(['project_id' => $project->id])->get();
            $dataHandbook['category'] = $project->category;
            $dataHandbook['editContentNo'] = $project->editContentNo;
            $dataHandbook['language'] = $project->language;
            $dataHandbook['user_id'] = Auth::guard('userList')->user()->id;
            $dataHandbook['price'] = $project->price;
            $dataHandbook['deleteCode'] = 0;
            $dataHandbook['about'] = $project->about;
            if ($userHandbook = UserHandbook::create($dataHandbook)) {
                foreach ($projectContentTitle as $value) {
                    $dataContentTitle['handbookContentTitle'] = $value->contentTitle;
                    $dataContentTitle['userHandbook_id'] = $userHandbook->id;
                    $dataContentTitle['order_by'] = $value->order_by;
                    $dataContentTitle['include'] = 1;
                    if ($userHandbookContentTitle = UserHandbookContentTitle::create($dataContentTitle)) {
                        $dataContent['handbook_content'] = $value->getContent->myProjectContent;
                        $dataContent['handbook_title_id'] = $userHandbookContentTitle->id;
                        UserHandbookContent::create($dataContent);
                    }
                }
                return redirect(route('handbookList'))->with('success', 'Success');
            }
        }
        return redirect(route('handbookList'))->with('fail', 'Create Failed ');
    }

    public function apiCreateUserHandbook(Request $request)
    {

        $myCategory = $request->category;
        $myLanguage = $request->language;
        $myPrice = $request->price;
        if ($project = Project::where(['category' => $myCategory, 'language' => $myLanguage, 'price' => $myPrice])->first()) {
            $projectContentTitle = ProjectContentTitle::where('project_id', $project->id)->get();
            $dataHandbook['category'] = $project->category;
            $dataHandbook['editContentNo'] = $project->editContentNo;
            $dataHandbook['language'] = $project->language;
            $dataHandbook['user_id'] = Auth::guard('userList')->user()->id;
            $dataHandbook['price'] = $project->price;
            $dataHandbook['deleteCode'] = 0;
            $dataHandbook['about'] = $project->about;
            if ($userHandbook = UserHandbook::create($dataHandbook)) {
                foreach ($projectContentTitle as $value) {
                    $dataContentTitle['handbookContentTitle'] = $value->contentTitle;
                    $dataContentTitle['userHandbook_id'] = $userHandbook->id;
                    $dataContentTitle['order_by'] = $value->order_by;
                    $dataContentTitle['include'] = 1;
                    if ($userHandbookContentTitle = UserHandbookContentTitle::create($dataContentTitle)) {
                        $dataContent['handbook_content'] = $value->getContent->myProjectContent;
                        $dataContent['handbook_title_id'] = $userHandbookContentTitle->id;
                        UserHandbookContent::create($dataContent);
                    };
                }
                return response()->json('success');
            }
        }
        return response()->json('fail');
    }


    public function titleContents($id)
    {
        $handbook = UserHandbook::find($id);
        $handbookContentTitle = UserHandbookContentTitle::where(['userHandbook_id' => $id])->orderBy('order_by', 'asc')->get();
        $lawyerList = LawyerProfile::all();
        if ($handbook) {
            if ($handbook->user_id === Auth::guard('userList')->user()->id && $handbook->deleteCode === '0') {
                return view('Frontend.userHandbook.HandbookContentTitle', compact('handbookContentTitle', 'handbook', 'lawyerList'));
            }
        }
        return redirect()->back();
    }


    public function contents($id)
    {
        $userInfo = UserInfo::where('user_id', Auth::guard('userList')->user()->id)->first();
        $hbContentTitle = UserHandbookContentTitle::find($id);
        if ($hbContentTitle) {
            if ($hbContentTitle->hbFromContentTitle->user_id === Auth::guard('userList')->user()->id) {
                $allContentTitle = UserHandbookContentTitle::where('userHandbook_id', $hbContentTitle->hbFromContentTitle->id)->get();
                return view('Frontend.userHandbook.handbookContent', compact('hbContentTitle', 'userInfo', 'allContentTitle'));
            }
        }
        return redirect()->back();
    }

    public function contentsUpdate(Request $request, $id)
    {
        $content = UserHandbookContent::find($id);
        if ($content) {
            $content->handbook_content = $request->handbook_content;
            $content->save();
            return redirect()->back()->with('success', 'Saved');
        }
        return redirect()->back()->with('fail', 'Failed');

    }


    public function includeCode(Request $request)
    {
        $handbookContentTitle = UserHandbookContentTitle::find($request->include);
        if ($handbookContentTitle->include === '1') {
            $handbookContentTitle->include = '0';
        } else {
            $handbookContentTitle->include = '1';
        }
        $handbookContentTitle->save();
        return response()->json($handbookContentTitle->include);
    }


//    Price
    public function priceList()
    {
        $priceList_active = 'active';
        $data['all'] = Project::where(['projectStatus' => '1'])->get();
        return view('Frontend.priceList', $data, compact('priceList_active'));
    }


//    User Profile

    public function userProfile()
    {
        $userInfoForm_active = 'active';
        $userListData = Auth::guard('userList')->user();
        return view('Frontend.userProfile', compact('userInfoForm_active', 'userListData'));
    }

    public function userProfileAction(Request $request)
    {
        $id = Auth::guard('userList')->user()->id;
        $request->validate([
            'username' => "required|min:3|unique:user_lists,username,$id",
            'email' => "required|unique:user_lists,email,$id",
            'currentPassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $currentPassword = $request->currentPassword;
        if ($userList = UserList::find($id)) {
            if (Hash::check($currentPassword, $userList->password)) {
                $userList->update($data);
                return redirect(route('frontend-dashboard'))->with('userListUpdated_msg', 'Updated');
            }else{
                return redirect()->back()->with('userListUpdated_msg', 'Incorrect Current Password');

            }
        }
        return redirect()->back()->with('fail', 'failed');
    }


//    Builder List

    public function builderList()
    {
        $handbookList_active = 'active';

        $data['handbook'] = Project::where(['type' => 'Handbook', 'projectStatus' => '1'])->orderBy('category')->get();
        $data['document'] = Project::where(['type' => 'Document', 'projectStatus' => '1'])->orderBy('category')->get();
        return view('Frontend.userHandbook.builderList', $data, compact('handbookList_active'));
    }


    public function builderListSelect($id)
    {
        $project = Project::find($id);
        return view('Frontend.userHandbook.builderListGet', compact('project'));
    }


    public function builderListCreate($id)
    {
        $created=0;
        if ($project = Project::find($id)) {
            $projectContentTitle = ProjectContentTitle::where(['project_id' => $project->id])->get();
            $dataHandbook['category'] = $project->category;
            $dataHandbook['editContentNo'] = $project->editContentNo;
            $dataHandbook['language'] = $project->language;
            $dataHandbook['user_id'] = Auth::guard('userList')->user()->id;
            $dataHandbook['price'] = $project->price;
            $dataHandbook['type'] = $project->type;
            $dataHandbook['publicOrPrivate'] = $project->publicOrPrivate;
            $dataHandbook['deleteCode'] = 0;
            $dataHandbook['about'] = $project->about;
            if ($userHandbook = UserHandbook::create($dataHandbook)) {
                foreach ($projectContentTitle as $value) {
                    $dataContentTitle['handbookContentTitle'] = $value->contentTitle;
                    $dataContentTitle['userHandbook_id'] = $userHandbook->id;
                    $dataContentTitle['order_by'] = $value->order_by;
                    $dataContentTitle['include'] = 1;
                    if ($userHandbookContentTitle = UserHandbookContentTitle::create($dataContentTitle)) {
                        $dataContent['handbook_content'] = $value->getContent->myProjectContent;
                        $dataContent['handbook_title_id'] = $userHandbookContentTitle->id;
                        UserHandbookContent::create($dataContent);
                        $created=1;
                    }
                }
                return redirect(route('handbookList'))->with('success', 'Thank you for Downloading Free Version!!');
            }
        }
        return redirect(route('handbookList'))->with('fail', 'Create Failed ');
    }

    public function builderListCreateApi(Request $request)
    {
        $id = $request->id;
        if ($project = Project::find($id)) {
            $projectContentTitle = ProjectContentTitle::where('project_id', $project->id)->get();
            $dataHandbook['category'] = $project->category;
            $dataHandbook['editContentNo'] = $project->editContentNo;
            $dataHandbook['language'] = $project->language;
            $dataHandbook['user_id'] = Auth::guard('userList')->user()->id;
            $dataHandbook['price'] = $project->price;
            $dataHandbook['type'] = $project->type;
            $dataHandbook['publicOrPrivate'] = $project->publicOrPrivate;
            $dataHandbook['deleteCode'] = 0;
            $dataHandbook['about'] = $project->about;
            if ($userHandbook = UserHandbook::create($dataHandbook)) {
                foreach ($projectContentTitle as $value) {
                    $dataContentTitle['handbookContentTitle'] = $value->contentTitle;
                    $dataContentTitle['userHandbook_id'] = $userHandbook->id;
                    $dataContentTitle['order_by'] = $value->order_by;
                    $dataContentTitle['include'] = 1;
                    if ($userHandbookContentTitle = UserHandbookContentTitle::create($dataContentTitle)) {
                        $dataContent['handbook_content'] = $value->getContent->myProjectContent;
                        $dataContent['handbook_title_id'] = $userHandbookContentTitle->id;
                        UserHandbookContent::create($dataContent);
                    };
                }
                return response()->json('success');
            }
        }
        return response()->json('fail');
    }


    public function myList()
    {
        $handbookList_active = 'active';
        $project = Project::where(['projectStatus' => '1'])->distinct('category')->pluck('category');
        $handbook = UserHandbook::where(['user_id' => Auth::guard('userList')->user()->id, 'deleteCode' => '0'])->get();
        return view('Frontend.userHandbook.handbookList', compact('project', 'handbook', 'handbookList_active'));
    }

}
