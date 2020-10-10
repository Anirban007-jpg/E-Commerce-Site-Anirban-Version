@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                <h3>Edit Product</h3>
                            @else
                                <h3>Add Product</h3>
                            @endif
                            <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i>Product List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <form method="post" action="{{(@$editData)?route('products.update', $editData->id):route('products.store')}}" id="myForm" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="category_id">Category:</label>
                                <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="brand_id">Brand:</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{(@$editData->brand_id==$brand->id)?"selected":""}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                                <div class="form-group col-md-4">
                                <label for="name">Product Name:</label>
                                <input type="text" name="name" value="{{@$editData->name}}" class="form-control" placeholder="Enter Product Name....">
                                <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Color:</label>
                                <select name="color_id[]" class="form-control select2" multiple>
                                    @foreach($color as $co)
                                        <option value="{{$co->id}}" {{(@in_array(['color_id'=>$co->id], $colorarr))?"selected":""}}>{{$co->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="size_id">Size:</label>
                                <select name="size_id[]" class="form-control select2" multiple>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id], $sizearr))?"selected":""}}>{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Short Description:</label>
                                <textarea name="short_desc" class="form-control" rows="1">{{@$editData->short_desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Long Description:</label>
                                <textarea name="long_desc" class="form-control" rows="5">{{@$editData->long_desc}}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Price:</label>
                                <input type="number" name="price" class="form-control" value="{{@$editData->price}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <img id="showImage" src="{{!empty($editData->image)?url('public/upload/product_images/' . $editData->image):url('public/upload/noimage.png')}}" style=" width: 100px; height: 105px; border: 2px solid #000;">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Sub Image:</label>
                                <input type="file" name="sub_image[]" class="form-control" multiple>
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

        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        category_id: {
                            required: true,
                        },
                        brand_id: {
                            required: true,
                        },
                        short_desc: {
                            required: true,
                        },
                        long_desc: {
                            required: true,
                        },
                        price: {
                            required:true,
                        },
                        messages: {

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
