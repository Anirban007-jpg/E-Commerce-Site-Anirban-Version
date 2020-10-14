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
           Customer Password Reset
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
                    <h3><strong>Customer Password Reset</strong></h3><br>
                    <form method="post" action="{{route('customer.password.update')}}" id="myForm">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="currentpassword"><strong>Current Password:</strong></label>
                                <input type="password" name="currentpassword" id="currentpassword" class="form-control">

                            </div>

                            <div class="form-group col-md-4">
                                <label for="newpassword"><strong>New Password:</strong></label>
                                <input type="password" name="newpassword" id="newpassword" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password"><strong>Confirm Password:</strong></label>
                                <input type="password" name="password2" class="form-control">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="Update Password" class="btn btn-primary">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="reset" value="RESET" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- /.card -->

    <script>
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {

                    currentpassword: {
                        required: true,
                        minlength: 6
                    },
                    newpassword: {
                        required: true,
                        minlength: 6
                    },
                    password2: {
                        required: true,
                        equalTo: '#newpassword',
                    },
                },
                messages: {
                    currentpassword: {
                        required: "Please provide the old password"
                    },
                    newpassword: {
                        required: "Please provide a new password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password2 : {
                        required: 'please enter the confirmed new password',
                        equalTo: 'Confirm password do not match'
                    }

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


@endsection
