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
                    <h3>Payment here</h3>

                </div>

            </div>
        </div>
        <!--login-->
    </div>
@endsection
