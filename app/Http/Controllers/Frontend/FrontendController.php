<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\Model\Communicator;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contact']=Contact::first();
        $data['products']=Product::orderBy('id','desc')->paginate(5);
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        return view('frontend.layouts.home', $data);
    }

    public function aboutUs(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['about']=About::first();
        return view('frontend.single_pages.about-us', $data);
    }


    public function contactUs(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.contact-us', $data);
    }
    public function ShoppingCart(){
        //dd('ok');
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.shopping-cart', $data);
    }

    public function productlist(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::orderBy('id','desc')->paginate(5);
        return view('frontend.single_pages.product-list', $data);
    }

    public function categorywiseproduct($category_id){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('frontend.single_pages.category-wise-product', $data);
    }

    public function brandwiseproduct($brand_id){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        return view('frontend.single_pages.Brand-wise-product', $data);
    }

    public function productdetails($slug){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        $data['product']=Product::where('slug',$slug)->first();
        $data['product_sub_images'] = ProductSubImage::where('product_id', $data['product']->id)->get();
        $data['product_colors'] = ProductColor::where('product_id', $data['product']->id)->get();
        $data['product_sizes'] = ProductSize::where('product_id', $data['product']->id)->get();
        return view('frontend.single_pages.product-info', $data);
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
