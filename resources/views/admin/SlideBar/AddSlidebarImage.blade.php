@extends('admin.master')
@section('title')
    Admin | Add-Brand
@endsection
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center text-success">Add Slidebar Image</h4>

                    </div>
                    <div class="panel-body">
                        {!!Form::open(['route'=>'save-slidebar','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

                            <div class="form-group">
                                <label class="control-label col-md-4">Slide Image 1</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="slide_image" accept="/image"/>
                                    <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-10 col-md-offset-4">
                                    <button type="submit" name="btn" class="btn btn-success btn-block">Save SlideBar Image</button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>

                    </div>

                </div>

            </div>
        </div>

@endsection
