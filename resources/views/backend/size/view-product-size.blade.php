@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Product Sizes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product Sizes</li>
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
                            <h3>Product Size List</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('sizes.add')}}"><i class="fa fa-plus-circle"></i>Add Product Size</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-md-12">
                            <table id="example1" class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th width="6%">SL.</th>
                                    <th>Product Size</th>
                                    <th width="12%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key => $size)
                                    @php
                                        $count = App\Model\ProductSize::where('size_id', $size->id)->count();
                                    @endphp
                                    <tr class="{{$size->id}}">
                                        <td>{{$key+1}}</td>
                                        {{--                                        <td><img src="{{!empty($slider->image)?url('public/upload/slider_images/'. $slider->image): url('public/upload/noimage.png')}}" width="120px" height="130px"></td>--}}
                                        <td>{{$size->name}}</td>
                                        <td>
                                            <a title='Edit' class="btn btn-sm btn-primary" href="{{route('sizes.edit', $size->id)}}"><i class="fa fa-edit"></i> </a>
                                            @if($count<1)
                                            <a title='Delete' id='delete' class="btn btn-sm btn-danger" href="{{route('sizes.delete', $size->id)}}"><i class="fa fa-trash"></i> </a>
                                            @endif
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
