@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
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
                            <h3>Add User</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{route('users.store')}}" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin">ADMIN</option>
                                    <option value="user">USER</option>
                                </select>
                                <span style=" color : red ">{{($errors->has('usertype'))?($errors->first('usertype')):''}}
                                </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Full Name:</label>
                                <input type="text" name="name" class="form-control">
                                <span style=" color : red ">{{($errors->has('name'))?($errors->first('name')):''}}
                                </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email ID:</label>
                                <input type="email" name="email" class="form-control">
                                <span style=" color : red ">{{($errors->has('email'))?($errors->first('email')):''}}
                                </span>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" name="mobile" class="form-control">
                                <span style=" color : red ">{{($errors->has('mobile'))?($errors->first('mobile')):''}}
                                </span>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control">
                                <span style=" color : red ">{{($errors->has('address'))?($errors->first('address')):''}}
                                </span>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">MALE</option>
                                    <option value="Female">FEMALE</option>
                                    <option value="Other">OTHER</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="password2" class="form-control">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" value="Add User" class="btn btn-primary">
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

        <script type="text/javascript">
            $(document).ready(function (){
                 $('#myForm').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true,
                        },
                        name: {
                            required: true,

                        },
                        gender: {
                            required: true,

                        },
                        mobile: {
                            required: true,
                            minlength:10,
                            maxlength:11
                        },
                        address: {
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
                            required: "Please enter the name of the user"
                        },
                        gender: {
                            required: "Please enter a user gender"
                        },
                        address: {
                            required: "Please enter a address of the user"
                        },
                        mobile: {
                            required: "Please enter a mobile number",
                            minlength: "Your mobile number must be greater 10 characters long",
                            maxlength: "Your mobile number must be less than or equal to 11 characters long"

                        },
                        email: {
                            required: "Please enter a email address",
                            email: "Please enter a <em>vaild</em> email address"
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
