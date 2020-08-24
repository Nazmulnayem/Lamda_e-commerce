@extends('admin.master')
@section('title')
    Admin | Add-Category
@endsection
@section('mainContent')
<div class="container">
<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center text-success">Add Category Form</h4>

            </div>
            <div class="panel-body">
                <form action="{{route('new-category')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group align-self-center">
                        <label class="control-label col-md-4">Category Name </label>
                        <div class="col-md-10">
                            <input type="text" name="category_name" class="form-control">
                            <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Category Description </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="category_description"></textarea>
                            <span class="text-danger">{{$errors->has('category_description') ? $errors->first('category_description') : ''}}</span>
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
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
</div>

@endsection
