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
                        <h4 class="text-center text-success">Add Product Form</h4>

                    </div>
                    <div class="panel-body">
                        {!!Form::open(['route'=>'save-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                        <div class="form-group align-self-center">
                            <label class="control-label col-md-4">Category Name </label>
                            <div class="col-md-10">
                               <select class="form-control" name="category_id" required>
                                   <option value="">---Select--CategoryName---</option>
                                   @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                   @endforeach
                                   <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                               </select>

                            </div>
                        </div>
                        <div class="form-group align-self-center">
                            <label class="control-label col-md-4">Sub Category Name</label>
                            <div class="col-md-10">

                                <select class="form-control" name="sub_category_id" required>
                                    <option value="">---Select--Sub_category_Name---</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</span>
                            </div>
                        </div>

                            <div class="form-group align-self-center">
                                <label class="control-label col-md-4">Brand Name </label>
                                <div class="col-md-10">

                                    <select class="form-control" name="brand_id" required>
                                        <option value="">---Select--BrandName---</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Product Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="product_name">
                                    <span class="text-danger">{{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Product Price</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="product_price">
                                    <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Product Quantity</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="product_quantity">
                                    <span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                                </div>

                            </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Short Description </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="short_description"></textarea>
                                <span class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Long Description </label>
                                <div class="col-md-10">
                                    <textarea class="form-control"  name="long_description"></textarea>
                                    <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Product Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="product_image" accept="/image"/>
                                    <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
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
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Product Info</button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
