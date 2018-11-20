@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>User</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('user.index')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter by User name"
                                   value="{{Request::get('name')}}" name="name">
                            <div class="input-group-append">
                                <input type="submit" value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="col-md-6">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('user.index')}}">Published</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Trash</a>
                    </li>
                </ul>
            </div>
            <hr class="my-3">
            @if(session('status'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            {{session('status')}}
                        </div>
                    </div>
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><b>Name</b></th>
                            <th><b>Username</b></th>
                            <th><b>Role</b></th>
                            <th><b>Action</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @if($user->role == "user")
                                        <span class="badge badge-primary badge-pill">
                                            {{$user->role}}
                                        </span>
                                    @else
                                        <span class="badge badge-warning badge-pill">
                                            {{$user->role}}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href=""
                                       class="btn btn-info btn-sm">Edit</a>
                                    <form class="d-inline" action=""
                                          method="POST" onsubmit="return confirm('Move Category to trash?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="10">
                                {{$users->appends(Request::all())->links()}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection