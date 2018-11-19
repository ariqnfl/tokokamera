@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Category</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('category.index')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter by Category name" value="{{Request::get('name')}}" name="name">
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
                            <a class="nav-link active" href="{{route('category.index')}}">Published</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.trash')}}">Trash</a>
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
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{route('category.create')}}" class="btn btn-primary">
                        Create Category
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><b>Name</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.edit', ['id'=> $category->id])}}" class="btn btn-info btn-sm">Edit</a>
                                    <form class="d-inline" action="{{route('category.destroy',['id'=> $category->id])}}"
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
                                {{$categories->appends(Request::all())->links()}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection