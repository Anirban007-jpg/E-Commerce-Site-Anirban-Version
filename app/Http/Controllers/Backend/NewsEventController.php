<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Model\NewsEvent;
use Illuminate\Support\Facades\Auth;

class NewsEventController extends Controller
{
    public function view(){
        $data['allData'] = NewsEvent::all();
        //$data['count'] = Logo::count();
        //dd($allData);
        return view('backend.newsevent.view-news-event', $data);
    }

    public function add(){
        return view('backend.newsevent.add-news-event');
    }

    public function store(Request $req){


        $data = new NewsEvent();
        $data->date = date('Y-m-d', strtotime($req->date));
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->created_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_event_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('news_events.view')->with('success','News and Event Inserted Successfully');
    }

    public function edit($id){
        $editData = NewsEvent::find($id);
        return view('backend.newsevent.edit-news-event', compact('editData'));
    }

    public function update($id, Request $req){
        $data = NewsEvent::find($id);
        $data->date = date('Y-m-d', strtotime($req->date));
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->updated_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_event_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('news_events.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $slider = NewsEvent::findOrFail($id);


        if (file_exists('public/upload/news_event_images/' . $slider->image) AND ! empty($slider->image)){
            unlink('public/upload/news_event_images/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('news_events.view')->with('success', 'User Record deleted Successfully');
    }
}
