<?php

namespace App\Http\Controllers;

use App\Model\ResourceContent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class resourceController extends Controller
{
    public function resourceAdd()
    {
        $resource_active = 'active';

        return view('Backend.pages.resources.resourceAdd', compact('resource_active'));
    }

    public function resourceAddAction(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'resources' => 'required'
        ]);
        $data['resources'] = $request->resources;
        $data['title'] = $request->title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->extension());
            $newName = $request->title . time() . '_.' . $extension;
            Image::make($file)->save(public_path('/uploads/ResourceImage/' . $newName));
            $data['image'] = $newName;
        }
        if (ResourceContent::create($data)) {
            return redirect(route('resourceManage'))->with('success', 'New Resources Added');
        }
        return redirect()->back()->with('fail', 'Failed');
    }

    public function resourceManage()
    {
        $resource_active = 'active';
        $myResources = ResourceContent::orderBy('id', 'desc')->get();
        return view('Backend.pages.resources.resourceManage', compact('resource_active', 'myResources'));
    }

    public function resourceUpdate($id)
    {
        $data = ResourceContent::find($id);
        return view('Backend.pages.resources.resourceUpdate', compact('data'));
    }

    public function resourceUpdateAction(Request $request, $id)
    {
        $data['resources'] = $request->resources;
        $data['title'] = $request->title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->extension());
            $newName = $request->title . time() . '_.' . $extension;
            Image::make($file)->save(public_path('/uploads/ResourceImage/' . $newName));
            $data['image'] = $newName;
        }
        if (ResourceContent::find($id)->update($data)) {
            return redirect(route('resourceManage'))->with('success', 'Updated Successfully');
        }
        return redirect()->back()->with('fail', 'Failed');
    }

    public function resourceDelete($id)
    {
        ResourceContent::find($id)->delete();
        return redirect(route('resourceManage'))->with('fail', 'Deleted');
    }

    public function frontendResourceList()
    {
        $frontendResourceList_active = 'active';
        $resourceList = ResourceContent::orderBy('id', 'desc')->get();
        return view('Frontend.Resources.frontendResourcesList', compact('frontendResourceList_active', 'resourceList'));
    }

    public function frontendResourceDetail($id)
    {
        $data = ResourceContent::find($id);
        return view('Frontend.Resources.frontendResourceDetail', compact('data'));
    }

}
