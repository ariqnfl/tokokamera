@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Camera</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('camera.trash')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter by Brand name"
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
                        <a class="nav-link" href="{{route('camera.index')}}">Published</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('camera.trash')}}">Trash</a>
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
                            <th><b>Logo</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cameras as $camera)
                            <tr>
                                <td>{{$camera->name}}</td>
                                <td>
                                    @if($camera->photo)
                                        <img src="{{asset('storage/'.$camera->photo)}}" alt="camera pic" width="48px">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('camera.restore',['id'=> $camera ->id])}}" class="btn btn-success btn-sm">Restore</a>
                                    <form class="d-inline" action="{{route('camera.delete-permanent',['id'=>$camera->id])}}" method="POST" onsubmit="return confirm('Delete this brand permanently?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="10">
                                {{$cameras->appends(Request::all())->links()}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection