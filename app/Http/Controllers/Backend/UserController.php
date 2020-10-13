<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function View(){
        $data['allData'] = User::where('usertype', 'admin')->where('status', 1)->get();
        //dd($allData);
        return view('backend.user.view-user', $data);
    }

    public function Add(){
        return view('backend.user.add-user');
    }

    public function Store(Request $req){

        $this->validate($req, [
            'role'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'mobile'=>'required|min:10|max:11',
            'address'=>'required',
            'gender'=>'required',
            'password'=>'required'
        ]);

        $data = new User();
        $data->usertype = 'admin';
        $data->role = $req->role;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->gender = $req->gender;
        $data->password = bcrypt($req->password);
        $data->save();
        return redirect()->route('users.view')->with('success','Data Inserted Successfully');
    }

    public function Edit($id){
        $editData = User::find($id);
        return view('backend.user.edit-user', compact('editData'));
    }

    public function Update($id, Request $req){
        $data = User::find($id);
        $data->role = $req->role;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->gender = $req->gender;
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data Updated successfully');
    }

    public function Delete($id){
        $user = User::findOrFail($id);
        if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)){
            unlink('public/upload/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success', 'User Record deleted Successfully');
    }

}
