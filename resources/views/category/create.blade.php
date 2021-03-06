@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Category</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form class="bg-white p-3" action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection