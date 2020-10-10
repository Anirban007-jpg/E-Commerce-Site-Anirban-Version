@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                            <h3>Product Details Info</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i>Product List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-md-12">
                            <table class="table table-bordered table-hover table-responsive-sm">
                                <tbody>
                                    <tr>
                                        <td width="50%">Category</td>
                                        <td width="50%">{{$details['category']['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Brand</td>
                                        <td width="50%">{{$details['brand']['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Name</td>
                                        <td width="50%">{{$details->name}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Price</td>
                                        <td width="50%">{{$details->price}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Short Description</td>
                                        <td width="50%">{{$details->short_desc}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Long Description</td>
                                        <td width="50%">{{$details->long_desc}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Image</td>
                                        <td width="50%"><img src="{{!empty($details->image)?url('public/upload/product_images/' . $details->image):url('public/upload/noimage.png')}}" style="width: 110px; height: 115px;">{{$details->image}}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Colors</td>
                                        <td width="50%">
                                            @php
                                                $colors = App\Model\ProductColor::where('product_id', $details->id)->get();
                                            @endphp
                                            @foreach($colors as $c)
                                                {{$c['color']['name']}},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Size</td>
                                        <td width="50%">
                                            @php
                                                $sizes = App\Model\ProductSize::where('product_id', $details->id)->get();
                                            @endphp
                                            @foreach($sizes as $s)
                                                {{$s['size']['name']}},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Product Sub Images</td>
                                        <td width="50%">
                                            @php
                                                $subimages = App\Model\ProductSubImage::where('product_id', $details->id)->get();
                                            @endphp
                                            @foreach($subimages as $si)
                                                <img src="{{url('public/upload/product_images/product_sub_images/'.$si->sub_image)}}" style="width: 110px; height: 115px;">
                                            @endforeach
                                        </td>
                                    </tr>
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
