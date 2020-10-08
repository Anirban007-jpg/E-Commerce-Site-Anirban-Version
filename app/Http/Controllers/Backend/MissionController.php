<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Mission;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function view(){
        $data['allData'] = Mission::all();
        $data['count'] = Mission::count();
        //$data['count'] = Logo::count();
        //dd($allData);
        return view('backend.mission.view-mission', $data);
    }

    public function add(){
        return view('backend.mission.add-mission');
    }

    public function store(Request $req){


        $data = new Mission();
        $data->title = $req->title;
        //$data->long_title = $req->long_title;
        $data->created_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('missions.view')->with('success','mission Inserted Successfully');
    }

    public function edit($id){
        $editData = Mission::find($id);
        return view('backend.mission.edit-mission', compact('editData'));
    }

    public function update($id, Request $req){
        $data = Mission::find($id);
        //$data->short_title = $req->short_title;
        $data->title = $req->title;
        $data->updated_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('missions.view')->with('success', 'Data Updated successfully');
    }

    public function DeleteSlider($id){
        $mission = Mission::findOrFail($id);


        if (file_exists('public/upload/mission_images/' . $mission->image) AND ! empty($mission->image)){
            unlink('public/upload/mission_images/' . $mission->image);
        }
        $mission->delete();
        return redirect()->route('misssions.view')->with('success', 'User Mission deleted Successfully');
    }
}
