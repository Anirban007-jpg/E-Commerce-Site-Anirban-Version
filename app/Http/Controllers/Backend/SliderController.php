<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function ViewSlider(){
        $data['allData'] = Slider::all();
        //$data['count'] = Logo::count();
        //dd($allData);
        return view('backend.slider.view-slider', $data);
    }

    public function AddSlider(){
        return view('backend.slider.add-slider');
    }

    public function StoreSlider(Request $req){


        $data = new Slider();
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->created_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('sliders.view')->with('success','slider Inserted Successfully');
    }

    public function EditSlider($id){
        $editData = Slider::find($id);
        return view('backend.slider.edit-slider', compact('editData'));
    }

    public function UpdateSlider($id, Request $req){
        $data = SLider::find($id);
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->updated_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('sliders.view')->with('success', 'Data Updated successfully');
    }

    public function DeleteSlider($id){
        $slider = Slider::findOrFail($id);


        if (file_exists('public/upload/slider_images/' . $slider->image) AND ! empty($slider->image)){
            unlink('public/upload/slider_images/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('sliders.view')->with('success', 'User Record deleted Successfully');
    }
}
