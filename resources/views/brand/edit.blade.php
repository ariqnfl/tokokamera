@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Brand</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form enctype="multipart/form-data" class="bg-white p-3"
                      action="{{route('brand.update', ['id'=> $brand->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Brand Name</label>
                    <input type="text" class="form-control" value="{{$brand->name}}" name="name">
                    <br><br>
                    @if($brand->photo)
                        <span>Current Logo</span>
                        <br><br>
                        <img src="{{asset('storage/'.$brand->photo)}}" width="120px">
                        <br><br>
                    @endif
                    <input type="file" class="form-control" name="photo">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    <br><br>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection