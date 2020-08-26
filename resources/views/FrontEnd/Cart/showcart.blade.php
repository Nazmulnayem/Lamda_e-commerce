@extends('FrontEnd.master')
@section('title')
    Lamda E-commerce | Cart
@endsection
@section('mainContent')

    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <div class="single-wl3">
            <div class="container">

                <div class="col-md-11 col-md-offset-1">
                    <h3 class="text-center text-success">Shopping Cart</h3>

                    <table class="table table-bordered table-responsive">
                        <tr class="bg-primary text-center">
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Total </th>
                            <th>Action</th>
                        </tr>
                           @php($i = 1)
                        @php($sum=0)
                        @foreach($cartProducts as $cartProduct)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cartProduct->name}}</td>
                            <td><img src="{{asset($cartProduct->options->image)}}"></td>
                            <td>{{$cartProduct->price}}</td>
                            <td>{{$cartProduct->options->size}}</td>

                            <td>
                                {{Form::open(['route'=>'update-cart','method'=>'post'])}}
                                <input type="number" name="qty" value="{{$cartProduct->qty}}" min="1"/>
                                <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" min="1"/>
                                <input type="submit" name="btn" value="Update" />
                                {{Form::close()}}
                            </td>

                            <td>{{$total =$cartProduct->price*$cartProduct->qty}}</td>
                            <td>
                                <a href="{{route('delete-cart-item',['rowId'=>$cartProduct->rowId])}}" class="btn btn-danger">
                                    <span class="fa fa-trash"></span>

                                </a>
                            </td>

                        </tr>
                            @php($sum = $sum + $total)
                        @endforeach

                    </table>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>Item Total price</th>
                            <td>{{ $sum }}</td>
                        </tr>
                        <tr>
                            <th>vat Total</th>
                            <td>{{ $vat = 0 }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>{{ $orderTotal = $sum+$vat }}</td>
                            <?php
                            Session::put('orderTotal','$orderTotal');
                            ?>

                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            @if(Session::get('customerID') && Session::get('shippingId'))
                                <a href="{{ route('payment') }}" class="btn btn-success pull-right">checkout</a>
                            @elseif(Session::get('customerID'))
                                <a href="{{ route('customer-shipping') }}" class="btn btn-success pull-right">checkout</a>
                            @else
                                <a href="{{ route('Customer-register') }}" class="btn btn-success pull-right">checkout</a>

                            @endif
                            <a href="checkout" class="btn btn-success">Continue shopping</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        </div>
@endsection
