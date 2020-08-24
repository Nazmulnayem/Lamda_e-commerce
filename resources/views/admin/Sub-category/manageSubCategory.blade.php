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
                            <th>Category Id</th>
                            <th>Subcategory Name</th>
                            <th>Subcategory Description</th>
                            <th>Subpublication status</th>
                            <th>action</th>


                        </tr>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{$subcategory->id}}</td>
                                <td>{{$subcategory->category_id}}</td>
                                <td>{{$subcategory->sub_category_name}}</td>
                                <td>{{$subcategory->sub_category_description}}</td>
                                <td>{{$subcategory->publication_status == 1? 'published':'unpublished'}}</td>
                                <td>
                                    @if($subcategory->publication_status == 1)
                                        <a href="{{route('unpublished-sub-category',['id'=>$subcategory->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @else
                                        <a href="{{route('published-sub-category',['id'=>$subcategory->id])}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                            <span class="fa fa-eye"></span>

                                        </a>
                                    @endif
                                    <a href="{{route('edit-sub-category',['id'=>$subcategory->id])}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Category">
                                        <span class="fa fa-edit"></span>

                                    </a>
                                    <a href="{{route('delete-sub-category',['id'=>$subcategory->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
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
