@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Approved Orders Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>Approved Order Details</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('orders.approved.list')}}"><i class="fa fa-list"></i>Approved List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-md-12">
                            <table class="txt-center mytable" width="100%" border="3">
                                <tr>
                                    <td width="30%" colspan="3">
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
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
@endsection
