@extends('admin.master')
@section('title')
    Admin | Manage-Brand
@endsection
@section('mainContent')<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>publication status</th>
                            <th>action</th>


                        </tr>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>{{$brand->brand_description}}</td>
                                <td>{{$brand->publication_status == 1? 'published':'unpublished'}}</td>
                                <td>
                                    @if($brand->publication_status == 1)
                                        <a href="{{route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @else
                                        <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @endif
                                    <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                        <span class="fa fa-edit"></span>

                                    </a>
                                    <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
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
@endsection
