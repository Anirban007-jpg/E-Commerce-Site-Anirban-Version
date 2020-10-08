<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function view(){
        //dd('ok');
        $id = Auth::user()->id;
        //dd($user);
        $user = User::find($id);

        return view('backend.user.view-profile', compact('user'));
    }

    public function edit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit-profile', compact('editData'));
    }

    public function update(Request $req){
        $data = User::find(Auth::user()->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->gender = $req->gender;
        if ($req->file('image')){
            $file = $req->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('profiles.view')->with('success', 'Profile Data Updated successfully');
    }

    public function passwordview(){
        return view('backend.user.edit-password');
    }

    public function passwordupdate(Request $req){
//        $this->validate($req, [
//            'newpassword'=>'required|min:6',
//            'password2'=>'required_with:password|same:password|min:6',
//            'currentpassword'=>'required|min:6'
//        ]);

        if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$req->currentpassword])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($req->newpassword);
            $user->save();
            return redirect()->route('profiles.view')->with('success', 'Your Password is reset successfully');
        }else{
            return redirect()->back()->with('error', 'Sorry your current password does not match');
        }
    }
}
