@extends('FrontEnd.master')
@section('title')
    Lamda E-commerce | Login
@endsection
@section('mainContent')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Registered</span></h3>
        </div>
    </div>
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile form1">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th> <p class="text-center text-success"> <span> Dear {{Session::get('customername')}} You have to give us a product shipping info to complete you order</span> <br>if your bill info and shipping info save then Click Send order here</p></th>

                        </tr>
                        </thead>
                    </table>
                    <h3>Shipping address here</h3>
                    {{Form::open(['route'=>'save-shipping','method'=>'post'])}}
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Name" type="text" name="name" value="{{$shipping->name}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" placeholder="Phone" type="text" name="phone_number" value="{{$shipping->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label>Email ID</label>
                        <input class="form-control" placeholder="Email" type="email" name="email" value="{{$shipping->email}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="address">
                                {{$shipping->address}}
                            </textarea>
                    </div>
                    <button class="btn btn-primary pull-right">Order place me here</button>
                    {{Form::close()}}
                </div>

            </div>
        </div>
        <!--login-->
    </div>
@endsection
