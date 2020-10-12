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


class CartController extends Controller
{
    public function addtoCart(Request $req){
        $this->validate($req, [
           'size_id'=>'required',
            'color_id'=>'required'
        ]);
        $product = Product::where('id',$req->id)->first();
        $productsize = Size::where('id',$req->size_id)->first();
        $productcolor = Color::where('id',$req->color_id)->first();
        Cart::add([
            'id'=>$product->id,
            'qty'=>$req->qty,
            'price'=>$product->price,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
              'size_id'=>$req->size_id,
                'size_name'=>$productsize->name,
                'color_id'=>$req->color_id,
                'color_name'=>$productcolor->name,
                'image' => $product->image
            ],
        ]);
        return redirect()->route('cart.show')->with('success', 'Product added successfully');
    }

    public function showCart(){
        $data['logo']=Logo::first();
        $data['contact']=Contact::first();
        return view('frontend.single_pages.shopping-cart', $data);
    }

    public function updateCart(Request $req){
        Cart::update($req->rowId, $req->qty);
        return redirect()->route('cart.show')->with('success', 'Product updated successfully');
    }

    public function deleteCart($rowId, Request $req){
        Cart::remove($rowId);
        return redirect()->route('cart.show')->with('success', 'Product deleted successfully');
    }

}

