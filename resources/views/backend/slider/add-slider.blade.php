@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                            <h3>Add Slider</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('sliders.view')}}"><i class="fa fa-list"></i>Slider List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{route('sliders.store')}}" id="myForm" enctype="multipart/form-data">

                        @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="short_title">Short Title:</label>
                            <input type="text" name="short_title" class="form-control" id="short_title">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="long_title">Long Title:</label>
                            <input type="text" name="long_title" class="form-control" id="long_title">
                        </div>
                    </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="form-group col-md-2">
                            <img id="showImage" src="{{url('public/upload/noimage.png')}}" style=" width: 150px; height: 150px; border: 2px solid #000;">
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="SUBMIT SLIDER" class="btn btn-primary">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="reset" value="RESET" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>


@endsection
