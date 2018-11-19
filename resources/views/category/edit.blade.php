@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form class="bg-white p-3" action="{{route('category.update', ['id'=> $category->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="name">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection