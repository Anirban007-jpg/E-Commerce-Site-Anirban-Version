@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                            <h3>Edit User Profile</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('profiles.view')}}"><i class="fa fa-list"></i>Your Profile</a>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                    <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="name">Full Name:</label>
                                <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                                {{--                                <span style=" color : red ">{{($errors->has('name'))?($errors->first('name')):''}}--}}
                                {{--                                </span>--}}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email ID:</label>
                                <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                                {{--                                <span style=" color : red ">{{($errors->has('email'))?($errors->first('email')):''}}--}}
                                {{--                                </span>--}}
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                                {{--                                <span style=" color : red ">{{($errors->has('mobile'))?($errors->first('mobile')):''}}--}}
                                {{--                                </span>--}}
                            </div>

                            <div class="form-group col-md-8">
                                <label for="address">Address:</label>
                                <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                                {{--                                <span style=" color : red ">{{($errors->has('mobile'))?($errors->first('mobile')):''}}--}}
                                {{--                                </span>--}}
                            </div>

                            <div class="form-group col-md-2">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" value="{{$editData->gender}}" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{($editData->gender=="Male")?"selected":""}}>MALE</option>
                                    <option value="Female" {{($editData->gender=="Female")?"selected":""}}>FEMALE</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="form-group col-md-2">
                            <img id="showImage" src="{{!empty($editData->image)?url('public/upload/user_images/'. $editData->image): url('public/upload/noimage.png')}}" style=" width: 150px; height: 150px; border: 2px solid #000;">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="Update User" class="btn btn-primary">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="reset" value="RESET" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>


@endsection
