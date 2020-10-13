<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function view(){
        $allData = User::where('usertype', 'customer')->where('status', '1')->get();
        return view('backend.customer.view-customer', compact('allData'));
    }

    public function draftview(){
        $allData = User::where('usertype', 'customer')->where('status', '0')->get();
        return view('backend.customer.view-draft-customer', compact('allData'));
    }

    public function delete(Request $request, $id){
        $customer = User::find($id);
        if (file_exists('public/upload/user_images/' . $customer->image) AND ! empty($customer->image)){
            unlink('public/upload/user_images/' . $customer->image);
        }
        $customer->delete();
        return redirect()->route('customers.draft.view')->with('success', 'Data deleted successfully');
    }
}
