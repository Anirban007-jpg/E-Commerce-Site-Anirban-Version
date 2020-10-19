<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use App\Model\Logo;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
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
use Session;
use Cart;


class OrderController extends Controller
{
    public function pending(){
        $data['orders']= Order::where('status','0')->get();
        return view('backend.order.pending-list',$data);
    }

    public function approved(){
        $data['orders']= Order::where('status','1')->get();
        return view('backend.order.approved-list',$data);
    }

    public function details($id){
        $data['order']= Order::find($id);
        return view('backend.order.order-details',$data);
    }

    public function approveproduct($id){
        $order = Order::find($id);
        $order->status = '1';
        $order->save();
        return redirect()->back()->with('success', 'Your order has been approved');
    }

    public function unapproveproduct($id){
        $order = Order::find($id);
        $order->status = '0';
        $order->save();
        return redirect()->back()->with('success', 'Your order has been unapproved');
    }
}
