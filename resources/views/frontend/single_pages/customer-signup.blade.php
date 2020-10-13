@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">

        #login .container #login-row #login-column #login-box {
            max-width: 700px;
            height: 820px;
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
                        <form id="login-form" class="form" action="" method="post">
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
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
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
@endsection
