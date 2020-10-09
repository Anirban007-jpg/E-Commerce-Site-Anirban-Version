@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                            <h3>Category List</h3>
                                 <a class="btn btn-success float-right btn-sm" href="{{route('categories.add')}}"><i class="fa fa-plus-circle"></i>Add Category</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-md-12">
                            <table id="example1" class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th width="6%">SL.</th>
                                    <th>Category Name</th>
                                    <th width="12%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key => $category)
                                    <tr class="{{$category->id}}">
                                        <td>{{$key+1}}</td>
                                        {{--                                        <td><img src="{{!empty($slider->image)?url('public/upload/slider_images/'. $slider->image): url('public/upload/noimage.png')}}" width="120px" height="130px"></td>--}}
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <a title='Edit' class="btn btn-sm btn-primary" href="{{route('categories.edit', $category->id)}}"><i class="fa fa-edit"></i> </a>
                                            <a title='Delete' id='delete' class="btn btn-sm btn-danger" href="{{route('categories.delete', $category->id)}}"><i class="fa fa-trash"></i> </a>
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
