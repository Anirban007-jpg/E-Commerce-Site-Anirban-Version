<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Logo;

class LogoController extends Controller
{
    public function ViewLogo(){
        $data['allData'] = Logo::all();
        $data['count'] = Logo::count();
        //dd($allData);
        return view('backend.logo.view-logo', $data);
    }

    public function AddLogo(){
        return view('backend.logo.add-logo');
    }

    public function StoreLogo(Request $req){


        $data = new Logo();
        $data->created_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logos.view')->with('success','logo Inserted Successfully');
    }

    public function EditLogo($id){
        $editData = Logo::find($id);
        return view('backend.logo.edit-logo', compact('editData'));
    }

    public function UpdateLogo($id, Request $req){
        $data = Logo::find($id);
        $data->updated_by = Auth::user()->id;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('logos.view')->with('success', 'Data Updated successfully');
    }

    public function DeleteLogo($id){
        $logo = Logo::findOrFail($id);


        if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)){
            unlink('public/upload/logo_images/' . $logo->image);
        }
        $logo->delete();
        return redirect()->route('logos.view')->with('success', 'User Record deleted Successfully');
    }

}
