
@extends('admin.master')
@section('title')
    Admin | User
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
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Password</th>
                            <th>action</th>


                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td>

                                    <a href="{{route('delete-user',['id'=>$user->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
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
