@extends('frontend.layouts.master')
@section('content')
    <style type="text/css">
        .s888{
            height: auto;
            border: 2px solid #e6e6e6;
        }
    </style>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Customer Payment
        </h2>
    </section>
    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                    <div class="wrap-table-shopping-cart">
                        <table class="table table-bordered">
                            <tr class="table_head">
                                <th>Product</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>

                            @php
                                $contents = Cart::content();
                                $total = 0;
                            @endphp
                            @foreach($contents as $content)
                                <tr class="table_row">
                                    <td>{{$content->name}}</td>
                                    <td>
                                        <div class="how-itemcart1">
                                            <img src="{{asset('public/upload/product_images/'.$content->options->image)}}" alt="IMG" style="width: 90px; height: 90px">
                                        </div>
                                    </td>
                                    <td>{{$content->options->size_name}}</td>
                                    <td>{{$content->options->color_name}}</td>
                                    <td>{{$content->price}} INR</td>
                                    <td style="width: 200px; min-width: 200px">
                                        <form method="post" action="{{route('cart.update')}}">
                                            @csrf
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <input class="mtext-104 cl3 txt-center num-product form-control sss" type="number" id="qty" name="qty" value="{{$content->qty}}">
                                                <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                                <input type="submit" value="Update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$content->subtotal}} INR</td>
                                    <td><a class="cart_quantity_delete btn btn-danger" href="{{route('cart.delete',$content->rowId)}}"><i class="fa fa-times"></i> </a> </td>
                                </tr>
                                @php
                                    /** @var TYPE_NAME $total */
                                    /** @var TYPE_NAME $content */
                                    $total += $content->subtotal;
                                @endphp
                            @endforeach
                                <tr>
                                    <td colspan="6" style="text-align: right;"><strong>Grand Total:</strong></td>
                                    <td colspan="2"><strong>Rs {{$total}} </strong></td>
                                </tr>
                        </table>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3><strong>Select Payment Method : </strong></h3>
                </div>
                <div class="col-md-8">
                    <form method="post" action="{{route('customer.payment.store')}}">
                        @csrf
                        <input type="hidden" name="order_total" value="{{$total}}">
                        <select name="payment_method" class="form-control" id="paymentmethod">
                            <option value="">Select Payment Type</option>
                            <option value="Cash on delivery">COD</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Paytm">Paytm</option>
                            <option value="Instamojo">Instamojo</option>
                        </select><br>
                        <span style=" color : red ">{{($errors->has('payment_method'))?($errors->first('payment_method')):''}}
                        </span>
                        <div class="show_field" style="display: none;">
                            <span>Paytm No is : 8250359959 </span>
                            <input type="text" name="transaction_number" class="form-control" placeholder="Write Transaction no">
{{--                            <span style=" color : red ">{{($errors->has('transaction_no'))?($errors->first('transaction_no')):''}}--}}
{{--                            </span>--}}
                        </div>
                        <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('change', '#paymentmethod', function (){
            var paymentmethod = $(this).val();
            if (paymentmethod == 'Paytm'){
                $('.show_field').show();
            }else{
                $('.show_field').hide();
            }
        });
    </script>
@endsection
