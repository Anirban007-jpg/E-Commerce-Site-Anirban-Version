<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\Model\Logo;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Size;
use App\Model\Product;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\ProductSubImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['user']=Auth::user();
        return view('frontend.single_pages.customer-dashboard', $data);
    }

    public function editProfile(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['editData']=User::find(Auth::user()->id);
        return view('frontend.single_pages.edit-customer-profile', $data);
    }

    public function updateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $user['image']=$filename;
        }
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
    }

    public function passwordChange(Request $request){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.password-change', $data);
    }

    public function passwordUpdate(Request $req){
        if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$req->currentpassword])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($req->newpassword);
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Your Password is reset successfully');
        }else{
            return redirect()->back()->with('error', 'Sorry your current password does not match');
        }
    }
}
