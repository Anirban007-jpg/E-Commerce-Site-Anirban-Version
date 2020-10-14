@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">
        label {
            font-weight: bolder;
            color: blue;
        }
        h3 {
            font-weight: bolder;
            color: #0e84b5;
            text-decoration: underline;
            text-decoration-style: dotted;

        }
    </style>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Billing Information
        </h2>
    </section>

    <section class="about_us">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><br>
                    <h3> Enter your shipping Details </h3><br>
                    <form method="post" action="{{route('customer.checkout.store')}}" id=checkoutForm">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Full Name:</label>
                                <input type="text" name="name" class="form-control">
                                <span style=" color : red ">{{($errors->has('name'))?($errors->first('name')):''}}
                                </span>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Email ID:</label>
                                <input type="email" name="email" class="form-control">

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Mobile Number:</label>
                                <input type="text" name="mobileno" class="form-control">
                                <span style=" color : red ">{{($errors->has('mobileno'))?($errors->first('mobileno')):''}}
                                </span>
                            </div>
                        </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Address:</label>
                                    <textarea type="text" name="address" class="form-control" rows="5"></textarea>
                                    <span style=" color : red ">{{($errors->has('address'))?($errors->first('address')):''}}
                                    </span>
                                </div>
                            </div><br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div><br>
                    </form>
                </div>
            </div>
        </div>
    </section>

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function (){--}}
{{--            $('#checkoutForm').validate({--}}
{{--                rules: {--}}
{{--                    name: {--}}
{{--                        required: true,--}}
{{--                    },--}}
{{--                    email: {--}}
{{--                        email: true,--}}
{{--                        unique:true--}}
{{--                    },--}}
{{--                    mobileno: {--}}
{{--                        required: true,--}}
{{--                        minlength:10,--}}
{{--                        maxlength:11--}}
{{--                    },--}}
{{--                    address: {--}}
{{--                        required: true,--}}
{{--                    },--}}
{{--                },--}}
{{--                messages: {--}}
{{--                    name: {--}}
{{--                        required: "Please enter the full name of the user"--}}
{{--                    },--}}
{{--                    email: {--}}
{{--                        email: "Please enter a <em>vaild</em> email address",--}}
{{--                        unique: "This email has already been taken"--}}
{{--                    },--}}
{{--                    mobileno: {--}}
{{--                        required: "Please enter a mobile number",--}}
{{--                        minlength: "Your mobile number must be greater 10 characters long",--}}
{{--                        maxlength: "Your mobile number must be less than or equal to 11 characters long"--}}
{{--                    },--}}
{{--                    address: {--}}
{{--                        required: "Please enter a address of the user"--}}
{{--                    },--}}

{{--                },--}}
{{--                errorElement: 'span',--}}
{{--                errorPlacement: function (error, element) {--}}
{{--                    error.addClass('invalid-feedback');--}}
{{--                    element.closest('.form-group').append(error);--}}
{{--                },--}}
{{--                highlight: function (element, errorClass, validClass) {--}}
{{--                    $(element).addClass('is-invalid');--}}
{{--                },--}}
{{--                unhighlight: function (element, errorClass, validClass) {--}}
{{--                    $(element).removeClass('is-invalid');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@endsection
