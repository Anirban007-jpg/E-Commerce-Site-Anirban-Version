<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\Vision;
use App\Mission;
use App\Model\NewsEvent;
use App\Model\Service;
use App\Model\About;
use App\Model\Communicator;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        $data['mission']=Mission::first();
        $data['vision']=Vision::first();
        $data['news']=NewsEvent::orderBy('id','desc')->get();
        $data['services']=Service::all();
        return view('frontend.layouts.home', $data);
    }

    public function aboutUs(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['about']=About::first();
        return view('frontend.single_pages.about-us', $data);
    }

    public function mission(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['mission']=Mission::first();
        return view('frontend.single_pages.mission', $data);
    }

    public function vision(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['vision']=Vision::first();
        return view('frontend.single_pages.vision', $data);
    }

    public function news(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['news']=NewsEvent::orderBy('id','desc')->get();
        return view('frontend.single_pages.news-events', $data);
    }

    public function contactUs(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.contact-us', $data);
    }

    public function newsDetails($id){
        $data['news'] = NewsEvent::find($id);
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.news-event-details', $data);
    }

    public function store(Request $req){
        $contact = new Communicator();
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->mobile_no = $req->mobile_no;
        $contact->address = $req->address;
        $contact->msg = $req->msg;
        $contact->save();
        $data = array(
            'name'=>$req->name,
            'email'=>$req->email,
            'mobile_no'=>$req->mobile_no,
            'address'=>$req->address,
            'msg'=>$req->msg
        );
        Mail::send('frontend.emails.contact',$data, function ($message) use($data) {
            $message->from('abanerjee763@gmail.com', 'Anirban Media');
            $message->to($data['email']);
            $message->subject('This is feedback for contacting us');
        });
        return redirect()->back()->with('success', 'Your message is succesfully sent');
    }
}