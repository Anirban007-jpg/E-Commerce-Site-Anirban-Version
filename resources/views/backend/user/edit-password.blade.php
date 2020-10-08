@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Password</h1>
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
                            <h3>Edit Password</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{route('profiles.password.update')}}" id="myForm">
                                @csrf


                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="currentpassword">Current Password:</label>
                                            <input type="password" name="currentpassword" id="currentpassword" class="form-control">

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="newpassword">New Password:</label>
                                            <input type="password" name="newpassword" id="newpassword" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="password">Confirm Password:</label>
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

                            <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>

    </div><!-- /.card-body -->

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
