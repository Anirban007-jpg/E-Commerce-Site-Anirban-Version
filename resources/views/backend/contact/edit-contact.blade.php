@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Contacts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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
                            <h3>Edit Contact</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('contacts.view')}}"><i class="fa fa-list"></i>Contact List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{route('contacts.update', $editData->id)}}" id="myForm" enctype="multipart/form-data">

                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control" value="{{$editData->address}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile No:</label>
                                <input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email ID:</label>
                                <input type="email" name="email" class="form-control" value="{{$editData->email}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="facebook">Facebook Link:</label>
                                <input type="text" name="facebook" class="form-control" value="{{$editData->facebook}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="twitter">Twitter Link:</label>
                                <input type="text" name="twitter" class="form-control" value="{{$editData->twitter}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="youtube">Youtube Link:</label>
                                <input type="text" name="youtube" class="form-control" value="{{$editData->youtube}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="googleplus">Google Plus Link:</label>
                                <input type="text" name="googleplus" class="form-control" value="{{$editData->googleplus}}">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="UPDATE CONTACT" class="btn btn-primary">
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
