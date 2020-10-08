<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\About;

class AboutController extends Controller
{
    public function view(){
        $data['allData'] = About::all();
        $data['count'] = About::count();
        //dd($allData);
        return view('backend.about.view-about', $data);
    }

    public function add(){
        return view('backend.about.add-about');
    }

    public function store(Request $req){


        $data = new About();
        $data->description = $req->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('abouts.view')->with('success','data Inserted Successfully');
    }

    public function edit($id){
        $editData = About::find($id);
        return view('backend.about.edit-about', compact('editData'));
    }

    public function update($id, Request $req){
        $data = About::find($id);
        $data->description = $req->description;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('abouts.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $about = About::findOrFail($id);
        $about->delete();
        return redirect()->route('abouts.view')->with('success', 'User Record deleted Successfully');
    }
}
