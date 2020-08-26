@extends('FrontEnd.master')
@section('title')
    Lamda E-commerce | Login
@endsection
@section('mainContent')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Login</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Login</h3>
                    {{Form::open()}}
                    <div class="form-group">
                        <label>Email ID</label>
                        <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" placeholder="Password" type="password" name="password">
                    </div>
                    <button class="btn btn-primary pull-right">Login</button>
                    {{Form::close()}}
                </div>
                <div class="forg">

                    <a href="{{route('Customer-register')}}">Not Signed In?</a>
                </div>
            </div>
        </div>
        <!--login-->
    </div>
@endsection
