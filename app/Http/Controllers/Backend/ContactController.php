<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Contact;
use App\Model\Communicator;

class ContactController extends Controller
{
    public function view(){
        $data['allData'] = Contact::all();
        $data['count'] = Contact::count();
        //dd($allData);
        return view('backend.contact.view-contact', $data);
    }

    public function add(){
        return view('backend.contact.add-contact');
    }

    public function store(Request $req){


        $data = new Contact();
        $data->address = $req->address;
        $data->mobile = $req->mobile;
        $data->email = $req->email;
        $data->facebook = $req->facebook;
        $data->twitter = $req->twitter;
        $data->youtube = $req->youtube;
        $data->googleplus = $req->googleplus;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('contacts.view')->with('success','contact Inserted Successfully');
    }

    public function edit($id){
        $editData = Contact::find($id);
        return view('backend.contact.edit-contact', compact('editData'));
    }

    public function update($id, Request $req){
        $data = Contact::find($id);
        $data->address = $req->address;
        $data->mobile = $req->mobile;
        $data->email = $req->email;
        $data->facebook = $req->facebook;
        $data->twitter = $req->twitter;
        $data->youtube = $req->youtube;
        $data->googleplus = $req->googleplus;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('contacts.view')->with('success', 'Data Updated successfully');
    }

    public function delete($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.view')->with('success', 'User Record deleted Successfully');
    }

    public function viewCommunicate(){
        $data['allData']=Communicator::orderBy('id','desc')->get();
        return view('backend.contact.view-communicate',$data);
    }
}
