@extends('admin.master')
@section('title')
    Admin | Manage-Product
@endsection
@section('mainContent')<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">


                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Publication Status</th>
                            <th>action</th>


                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td><img src="{{asset($product->product_image)}}" style="width:100px; height:100px"></td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->short_description}}</td>
                                <td>{{$product->long_description}}</td>
                                <td>{{$product->publication_status == 1? 'published':'unpublished'}}</td>
                                <td>
                                    @if($product->publication_status == 1)
                                        <a href="" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @else
                                        <a href="" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @endif
                                    <a href="" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                        <span class="fa fa-edit"></span>

                                    </a>
                                    <a href="" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                                        <span class="fa fa-trash"></span>

                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
