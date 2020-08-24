@extends('admin.master')
@section('title')
    Admin | Manage-Category
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
                            <th>category Name</th>
                            <th>category Description</th>
                            <th>publication status</th>
                            <th>action</th>


                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->publication_status == 1? 'published':'unpublished'}}</td>
                                <td>
                                    @if($category->publication_status == 1)
                                    <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                        <span class="fa fa-eye"></span>

                                    </a>
                                    @else
                                        <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @endif
                                    <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                        <span class="fa fa-edit"></span>

                                    </a>
                                    <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
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
