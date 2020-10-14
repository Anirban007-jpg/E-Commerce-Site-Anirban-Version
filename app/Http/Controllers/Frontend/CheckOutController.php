<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Shipping;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Logo;
use App\Model\Size;
use App\Model\Color;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\Model\Communicator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function login(Request $request){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.customer-login', $data);
    }

    public function signup(Request $request){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.customer-signup', $data);
    }

    public function signupStore(Request $request){
        DB::transaction(function () use($request){
            $this->validate($request, [
           'name'=>'required',
           'email'=>'required|unique:users,email',
           'password'=>'min:6|required_with:password2|same:password2',
           'password2'=>'min:6',
         ]);

            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->status = 0;
            $user->usertype = 'customer';
            $user->save();
            $data = array(
                'name'=>$request->name,
                'email'=>$request->email,
                'code'=>$code
            );
            Mail::send('frontend.emails.verify-email',$data, function ($message) use($data) {
                $message->from('abanerjee763@gmail.com', 'Anirban Media');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });
        });
        return redirect()->route('email.verify')->with('success', 'You have successfully signed up....please verify your email');
    }

    public function emailVerify(Request $request){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.email-verify', $data);
    }

    public function verifyStore(Request $request){
        $checkData = User::where('email', $request->email)->where('code',$request->code)->first();
        if ($checkData){
            $checkData->status = '1';
            $checkData->email_verified_at = now();
            $checkData->save();
            return redirect()->route('customer.login')->with('success', 'Email is successfully verified');
        }else{
            return redirect()->back()->with('error', 'Sorry your verification code or email does not match...');
        }

    }

    public function checkout(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.customer-checkout', $data);
    }

    public function checkoutStore(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'mobileno'=>'required',
            'address'=>'required'
        ]);

        $checkout = new Shipping();
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobileno = $request->mobileno;
        $checkout->address = $request->address;
        $checkout->user_id = Auth::user()->id;
        $checkout->save();
        Session::put('shipping_id', $checkout->id);
        return redirect()->route('customer.payment')->with('success', 'Your Order is placed successfully...Proceed For payment');
    }

}
