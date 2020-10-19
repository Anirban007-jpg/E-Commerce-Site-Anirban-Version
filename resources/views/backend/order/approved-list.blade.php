@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Approved Orders</h1>
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
                            <h3>Approved Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-md-12">
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Total Amount</th>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Unapprove Action</th>
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
                                            <a href="{{route('orders.approved.details.list', $order->id)}}"><i class="fa fa-eye btn-primary">Details</i> </a>
                                        </td>
                                        <td>
                                        <a title="approved" name="approve" class="btn btn-danger btn-sm" href="{{route('orders.unapproved.product', $order->id)}}" id="approve"><i class="fa fa-cross">Un-Approve Product</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
