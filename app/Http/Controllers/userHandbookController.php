<?php

namespace App\Http\Controllers;

use App\Model\Frontend\UserHandbook;
use App\Model\Frontend\UserHandbookContent;
use App\Model\Frontend\UserHandbookContentTitle;
use App\Model\Frontend\UserInfo;
use App\Model\Project;
use App\Model\ProjectContentTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userHandbookController extends Controller
{
    public function handbookList()
    {
        $project = Project::where(['projectStatus' => '1'])->distinct('category')->pluck('category');
        $handbook = UserHandbook::where(['user_id' => Auth::guard('userList')->user()->id, 'deleteCode' => '0'])->get();
        return view('Frontend.userHandbook.handbookList', compact('project', 'handbook'));
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

//    public function createUserHandbook(Request $request)
//    {
//        $myCategory = $request->myCategory;
//        $myLanguage = $request->myLanguage;
//        if ($project = Project::where(['category' => $myCategory, 'language' => $myLanguage])->first()) {
//            $projectContentTitle = ProjectContentTitle::where('project_id', $project->id)->get();
//            $dataHandbook['category'] = $project->category;
//            $dataHandbook['editContentNo'] = $project->editContentNo;
//            $dataHandbook['language'] = $project->language;
//            $dataHandbook['user_id'] = Auth::guard('userList')->user()->id;
//            $dataHandbook['price'] = $project->price;
//            $dataHandbook['deleteCode'] = 0;
//            if ($userHandbook = UserHandbook::create($dataHandbook)) {
//                foreach ($projectContentTitle as $value) {
//                    $dataContentTitle['handbookContentTitle'] = $value->contentTitle;
//                    $dataContentTitle['userHandbook_id'] = $userHandbook->id;
//                    $dataContentTitle['order_by'] = $value->order_by;
//                    $dataContentTitle['include'] = 1;
//                    if ($userHandbookContentTitle = UserHandbookContentTitle::create($dataContentTitle)) {
//                        $dataContent['handbook_content'] = $value->getContent->myProjectContent;
//                        $dataContent['handbook_title_id'] = $userHandbookContentTitle->id;
//                        UserHandbookContent::create($dataContent);
//                    };
//                }
//            }
//
//            if ($project->language === 'Nepali') {
//                $language = "<span class=\"label label-primary\">" . $project->language . "</span>";
//            } else {
//                $language = "<span class=\"label label-warning\">" . $project->language . "</span>";
//            }
//            if($project->price ==='Free'){
//                $price="<span class=\"label label-default\">".$project->price."</span>";
//            }else{
//                $price="<span class=\"label label-success\">".$project->price."</span>";
//
//            }
//
//            $output = "<div style=\"margin-bottom: 10px;text-align: left\" class=\"col-lg-4 col-md-6 col-sm-6 col-xs-12\">
//                <a href=\"" . route('handbookContentTitle', $userHandbook->id) . "\">
//                    <div class=\"contact-inner \" id=\"card\">
//                        <div class=\"contact-hd widget-ctn-hd\">
//                            <h2>" . ucfirst($project->category) . "</h2>
//                            <p>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</p>
//                        </div>
//                        <br>
//                        <div class=\"row\">
//                             <div class=\"col-md-6\">- " . $language . "
//                                </div>
//                             <div class=\"col-md-6\">- " . $price . "
//                                </div>
//                        </div>
//                    </div>
//                </a>
//            </div>";
//            return response()->json($output);
//        } else {
//            return response()->json('error');
//        }
//
//    }

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
                        return redirect(route('handbookList'))->with('success', 'Success');
                    };
                }
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
                        return response()->json('success');
                    };
                }
            }
        }
        return response()->json('fail');
    }


    public function titleContents($id)
    {
        $handbook = UserHandbook::find($id);
        $handbookContentTitle = UserHandbookContentTitle::where(['userHandbook_id' => $id])->orderBy('order_by', 'asc')->get();
        if ($handbook) {
            if ($handbook->user_id === Auth::guard('userList')->user()->id && $handbook->deleteCode === '0') {
                return view('Frontend.userHandbook.HandbookContentTitle', compact('handbookContentTitle', 'handbook'));
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
                return view('Frontend.userHandbook.handbookContent', compact('hbContentTitle', 'userInfo'));
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
        $data['all'] = Project::where(['projectStatus'=>'1'])->get();
        return view('Frontend.priceList', $data);
    }


}
