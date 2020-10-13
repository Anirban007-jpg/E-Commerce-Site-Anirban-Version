@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">

        #login .container #login-row #login-column #login-box {
            max-width: 700px;
            height: 1020px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            margin-bottom: 50px;
            margin-top: 50px;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Registration
        </h2>
    </section>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route('customer.signup.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="text-info"><strong>Full Name:</strong></label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Email ID:</strong></label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Mobile Number:</strong></label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Address:</strong></label><br>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Gender:</strong></label><br>
                                <select name="gender" id="gender">
                                    <option value="">Selct your Category</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Password:</strong></label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info"><strong>Confirm Password:</strong></label><br>
                                <input type="password" name="password2" id="password2" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign Up">
                                <input type="reset" name="Reset" class="btn btn-danger btn md" value="Reset">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-user"></i>Already Have a account ? <a href="{{route('customer.login')}}"><span><strong> Log in here!!!</strong></span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#login-form').validate({
                rules: {
                    name: {
                        required: true,

                    },
                    email: {
                        required: true,
                        email: true,
                        unique:true
                    },
                    mobile: {
                        required: true,
                        minlength:10,
                        maxlength:11,
                        unique:true
                    },
                    address: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password2: {
                        required: true,
                        equalTo: '#password',
                    },
                },
                messages: {
                   name: {
                        required: "Please enter the full name of the user"
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a <em>vaild</em> email address"
                    },
                    mobile: {
                        required: "Please enter a mobile number",
                        minlength: "Your mobile number must be greater 10 characters long",
                        maxlength: "Your mobile number must be less than or equal to 11 characters long"
                    },
                    address: {
                        required: "Please enter a address of the user"
                    },
                    gender: {
                        required: "Please enter a user gender"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password2 : {
                        required: 'please enter the confirmed password',
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
