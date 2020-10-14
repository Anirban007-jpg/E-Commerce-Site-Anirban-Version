@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">
        .prof li{
            background: #1781BF;
            padding: 7px;
            margin: 3px;
            border-radius: 15px;
        }
        .prof li a{
            color: #fff;
            font-weight: bolder;
            padding-left: 15px;
        }
        label {
            color: red;
        }
    </style>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Dashboard
        </h2>
    </section>

    <!-- About us Section -->
    <section class="about_us">
        <div class="container">
            <div class="row" style="padding: 15px 0px 15px 0px">
                <div class="col-md-2">
                    <ul class="prof">
                        <li><a href="{{route('dashboard')}}">My Profile</a></li>
                        <li><a href="{{route('customer.password.change')}}">Password Change</a></li>
                        <li><a href="">My Orders</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <h3><strong>Customer Profile Edit/Update</strong></h3><br>
                    <form method="post" action="{{route('customer.update.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><strong>Full Name</strong></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}">
                            </div>
                            <div class="col-md-4">
                                <label><strong>Email ID</strong></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$editData->email}}">
                            </div>
                            <div class="col-md-4">
                                <label><strong>Mobile Number</strong></label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="{{$editData->mobile}}">
                            </div>
                            <div class="col-md-4">
                                <label><strong>Address</strong></label>
                                <input type="text" name="address" id="address" class="form-control" value="{{$editData->address}}">
                            </div>
                            <div class="col-md-4">
                                <label><strong>Gender</strong></label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{($editData->gender=="Male")?"selected":''}}>MALE</option>
                                    <option value="Female" {{($editData->gender=="Female")?"selected":''}}>FEMALE</option>
                                    <option value="Other" {{($editData->gender=="Other")?"selected":''}}>OTHER</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label><strong>Image</strong></label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <img id="showImage" src="{{!empty($editData->image)?url('public/upload/user_images/'. $editData->image): url('public/upload/noimage.png')}}" style=" width: 80px; height: 90px; border: 2px solid #000;">
                            </div>
                            <div class="col-md-4" style="padding-top: 30px;">
                                <button type="submit" class="btn btn-primary">Profile Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
