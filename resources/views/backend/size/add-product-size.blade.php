@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Product Sizes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product Sizes</li>
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
                            @if(isset($editData))
                                <h3>Edit Product Size</h3>
                            @else
                                <h3>Add Product Size</h3>
                            @endif
                            <a class="btn btn-success float-right btn-sm" href="{{route('sizes.view')}}"><i class="fa fa-list"></i>Product Size List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{(@$editData)?route('sizes.update', $editData->id):route('sizes.store')}}" id="myForm" enctype="multipart/form-data">

                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Product Size Name:</label>
                                <input type="text" name="name" value="{{@$editData->name}}" class="form-control" placeholder="Product Size Name....">
                                <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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

        <script type="text/javascript" style="color: red;">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        messages: {
                            name: {
                                required: "Please enter the name of the user"
                            },
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
                        },
                    },
                });
            });
        </script>

@endsection
