<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionController extends Controller
{
    public function view(){
        $data['allData'] = Vision::all();
        $data['count'] = Vision::count();
        //$data['count'] = Logo::count();
        //dd($allData);
        return view('backend.vision.view-vision', $data);
    }

    public function add(){
        return view('backend.vision.add-vision');
    }

    public function store(Request $req){


        $data = new Vision();
        $data->title = $req->title;
        //$data->long_title = $req->long_title;
        $data->created_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('visions.view')->with('success','vision Inserted Successfully');
    }

    public function edit($id){
        $editData = Vision::find($id);
        return view('backend.vision.edit-vision', compact('editData'));
    }

    public function update($id, Request $req){
        $data = Vision::find($id);
        //$data->short_title = $req->short_title;
        $data->title = $req->title;
        $data->updated_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('visions.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $vision = Vision::findOrFail($id);


        if (file_exists('public/upload/vision_images/' . $vision->image) AND ! empty($vision->image)){
            unlink('public/upload/vision_images/' . $vision->image);
        }
        $vision->delete();
        return redirect()->route('visions.view')->with('success', 'User Vision deleted Successfully');
    }
}
