@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List of Communicators</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Communicators</li>
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
                            <h3>Communicate List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Message</th>
                               </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key => $contact)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        {{--                                        <td><img src="{{!empty($slider->image)?url('public/upload/slider_images/'. $slider->image): url('public/upload/noimage.png')}}" width="120px" height="130px"></td>--}}
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->address}}</td>
                                        <td>{{$contact->mobile_no}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->msg}}</td>

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
