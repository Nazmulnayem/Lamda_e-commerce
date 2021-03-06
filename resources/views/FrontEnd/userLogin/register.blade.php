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
                    <h3>Register</h3>
                    {{Form::open(['route'=>'customer-sign-up','method'=>'POST'])}}
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Name" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" placeholder="Phone" type="text" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label>Email ID</label>
                        <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" placeholder="Password" type="password" name="password">
                        <span class="help-block">Password should be 6 characters long.</span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="address">

                            </textarea>
                    </div>
                    <button class="btn btn-primary pull-right">Sign Up</button>
                    {{Form::close()}}
                </div>

            </div>
        </div>
        <!--login-->
    </div>
@endsection
