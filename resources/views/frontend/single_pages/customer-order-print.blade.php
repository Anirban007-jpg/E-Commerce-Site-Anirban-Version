<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Invoice</title>
</head>
<body>
    <center>
        <table class="txt-center mytable" width="100%" border="3">
            <tr>
            <td width="30%">
                <img src="{{url('public/upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO">
            </td>
            <td width="40%">
                <h4><strong>Anirban's Media</strong></h4>
                <span><strong>Mobile : </strong>{{$contact->mobile}}</span><br/>
                <span><strong>Email : </strong>{{$contact->email}}</span><br/>
                <span><strong>Address : </strong>{{$contact->address}}</span>
            </td>
            <td width="30%">
                <strong>Order no : # {{$order->order_number}}</strong>
            </td>
        </tr>
        <tr>
            <td><strong>Billing Info : </strong></td>
            <td colspan="2" style="text-align: left;">
                <strong>Person to whom Product is to be sent : </strong> {{$order['shipping']['name']}}<br/>
                <strong>Product Bought by : </strong> {{@Auth::user()->name}}<br/>
                <strong>Buyer's Mobile Number : </strong> {{$order['shipping']['mobileno']}}<br/>
                <strong>Buyer's Email ID : </strong> {{$order['shipping']['email']}}<br/>
                <strong>Shipping Address : </strong> {{$order['shipping']['address']}}<br/>
            </td>
        </tr>
        <tr>
            <td><strong>Payment Info :</strong></td>
            <td colspan="2" style="text-align: left">
                <strong>Payment : </strong> {{$order['payment']['payment_method']}}
                @if($order['payment']['payment_method']=='Paytm')
                    {Transaction no : {{$order['payment']['transaction_number']}}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>Order Details : </strong></td>
        </tr>
        <tr>
            <td><strong>Product Name & Image : </strong></td>
            <td><strong>Product Color and Size : </strong></td>
            <td><strong>Product Quantity and Price : </strong></td>
        </tr>
        @foreach($order['orderdetails'] as $details)
            <tr>
                <td>
                    <img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 110px; height: 115px;"> &nbsp; &nbsp; {{$details['product']['name']}}
                </td>
                <td>{{$details['color']['name']}} &nbsp; &nbsp; &nbsp; {{$details['size']['name']}}</td>
                <td>
                    @php
                        /** @var TYPE_NAME $details */
                        $subtotal = $details['product']['price']*$details->quantity
                    @endphp
                    {{$details->quantity}} x {{$details['product']['price']}} = {{$subtotal}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" style="text-align: right;"><strong>Grand Total:</strong></td>
            <td><strong>{{$order->order_total}}</strong></td>
        </tr>
      </table>
    </center>
</body>
</html>
