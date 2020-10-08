@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Logo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Logo</li>
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
                            <h3>Add Logo</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('logos.view')}}"><i class="fa fa-list"></i>Logo List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{route('logos.store')}}" id="myForm" enctype="multipart/form-data">

                        @csrf


                        <div class="form-group col-md-4">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="form-group col-md-2">
                            <img id="showImage" src="{{url('public/upload/noimage.png')}}" style=" width: 150px; height: 150px; border: 2px solid #000;">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="SUBMIT LOGO" class="btn btn-primary">
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
