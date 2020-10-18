@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">
        .mytable tr td{
            padding: 10px;
        }
        .prof li{
            background: #1781BF;
            padding: 7px;
            margin: 3px;
            border-radius: 15px;
        }
        .prof li a{
            color: #fff;
            font-weight: bolder;
            padding-left: 15px;
        }
    </style>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Order Details
        </h2>
    </section>

    <!-- About us Section -->
    <section class="about_us">
        <div class="container">
            <div class="row" style="padding: 15px 0px 15px 0px">
                <div class="col-md-2">
                    <ul class="prof">
                        <li><a href="{{route('dashboard')}}">My Profile</a></li>
                        <li><a href="{{route('customer.password.change')}}">Password Change</a></li>
                        <li><a href="{{route('customer.order.list')}}">My Orders</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <table class="txt-center mytable" width="100%" border="3">
                        <tr>
                            <td width="30%">
                                <img src="{{url('public/upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO">
                            </td>
                            <td width="40%">
                                <h4><strong>Anirban's Media</strong></h4>
                                <span><strong>Mobile : </strong>{{$contact->mobile}}</span><br/>
                                <span><strong>Email : </strong>{{$contact->email}}</span><br/>
                                <span><strong>Address : </strong>{{$contact->address}}</span>
                            </td>
                            <td width="30%">
                                <strong>Order no : # {{$order->order_number}}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Billing Info : </strong></td>
                            <td colspan="2" style="text-align: left;">
                                <strong>Person to whom Product is to be sent : </strong> {{$order['shipping']['name']}}<br/>
                                <strong>Product Bought by : </strong> {{@Auth::user()->name}}<br/>
                                <strong>Buyer's Mobile Number : </strong> {{$order['shipping']['mobileno']}}<br/>
                                <strong>Buyer's Email ID : </strong> {{$order['shipping']['email']}}<br/>
                                <strong>Shipping Address : </strong> {{$order['shipping']['address']}}<br/>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Payment Info :</strong></td>
                            <td colspan="2" style="text-align: left">
                                <strong>Payment : </strong> {{$order['payment']['payment_method']}}
                                    @if($order['payment']['payment_method']=='Paytm')
                                        {Transaction no : {{$order['payment']['transaction_number']}}
                                    @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Order Details : </strong></td>
                        </tr>
                        <tr>
                            <td><strong>Product Name & Image : </strong></td>
                            <td><strong>Product Color and Size : </strong></td>
                            <td><strong>Product Quantity and Price : </strong></td>
                        </tr>
                        @foreach($order['orderdetails'] as $details)
                        <tr>
                            <td>
                                <img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 110px; height: 115px;"> &nbsp; &nbsp; {{$details['product']['name']}}
                            </td>
                            <td>{{$details['color']['name']}} &nbsp; &nbsp; &nbsp; {{$details['size']['name']}}</td>
                            <td>
                                @php
                                    /** @var TYPE_NAME $details */
                                    $subtotal = $details['product']['price']*$details->quantity
                                @endphp
                                {{$details->quantity}} x {{$details['product']['price']}} = {{$subtotal}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right;"><strong>Grand Total:</strong></td>
                            <td><strong>{{$order->order_total}}</strong></td>
                        </tr>
                    </table>
                </div>
    </section>

@endsection
