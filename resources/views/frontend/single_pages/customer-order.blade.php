@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">
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
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Placed Orders
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
                    <table class="table table-bordered table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Total Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td># {{$order->order_number}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <th>
                                        {{$order['payment']['payment_method']}}
                                        @if($order['payment']['payment_method']=='Paytm')
                                            {Transaction no : {{$order['payment']['transaction_number']}}
                                        @endif
                                    </th>
                                    <td>
                                        @if($order->status=='0')
                                            <span style="background: #DC4E41; padding: 5px; color: #e6e6e6; font-weight: bolder;">Unapproved</span>
                                        @elseif($order->status=='1')
                                            <span style="background: #00A000; padding: 5px; color: #e6e6e6; font-weight: bolder;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a title="details" href="{{route('customer.order.details', $order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a title="print" target="_blank" href="{{route('customer.order.print', $order->id)}}" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
