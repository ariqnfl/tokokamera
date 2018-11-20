@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Brand</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form enctype="multipart/form-data" class="bg-white p-3" action="{{route('brand.store')}}" method="POST">
                    @csrf
                    <label for="">Brand Name</label>
                    <input type="text" class="form-control" name="name">
                    <br>
                    <label for="">Brand Logo</label>
                    <input type="file" class="form-control" name="photo">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection