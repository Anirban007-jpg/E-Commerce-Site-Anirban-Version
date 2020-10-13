<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Mail;
use Cart;

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
}
