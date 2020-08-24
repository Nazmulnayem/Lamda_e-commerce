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
                        <h4 class="text-center text-success">Add Brand Form</h4>

                    </div>
                    <div class="panel-body">
                        {!!Form::open(['url'=>'/save-brand','method'=>'POST','class'=>'form-horizontal'])!!}
                        <div class="form-group align-self-center">
                            <label class="control-label col-md-4">Brand Name </label>
                            <div class="col-md-10">
                                <input type="text" name="brand_name" class="form-control">
                                <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Description </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="brand_description"></textarea>
                                <span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication Status </label>
                            <div class="col-md-10 radio">
                                <label><input type="radio" checked name="publication_status" value="1"> Published</label>
                                <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-4">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Brand Info</button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
