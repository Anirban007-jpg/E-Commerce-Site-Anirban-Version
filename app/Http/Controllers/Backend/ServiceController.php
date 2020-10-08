<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Service;

class ServiceController extends Controller
{
    public function view(){
        $data['allData'] = Service::all();
        //$data['count'] = Service::count();
        //dd($allData);
        return view('backend.service.view-service', $data);
    }

    public function add(){
        return view('backend.service.add-service');
    }

    public function store(Request $req){


        $data = new Service();
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('services.view')->with('success','service Inserted Successfully');
    }

    public function edit($id){
        $editData = Service::find($id);
        return view('backend.service.edit-service', compact('editData'));
    }

    public function update($id, Request $req){
        $data = Service::find($id);
        $data->short_title = $req->short_title;
        $data->long_title = $req->long_title;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('services.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.view')->with('success', 'User Record deleted Successfully');
    }
}
