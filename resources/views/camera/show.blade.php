@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{$camera->name}}</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <div class="form-group">
                    @if($camera->photo)
                        <img src="{{asset('storage/'.$camera->photo)}}" width="128px">
                    @else
                        No Image
                    @endif
                </div>
                <label for=""><b>Camera Price</b></label>
                <div class="form-group">
                    Rp. {{$camera->price}}
                </div>
                <label for=""><b>Camera Stock</b></label>
                <div class="form-group">
                    {{$camera->stock}} pcs
                </div>
                <label for=""><b>Camera Description</b></label>
                <div class="form-group">
                    {{$camera->desc}}
                </div>
                <label for=""><b>Camera Categories</b></label>
                <div class="form-group">
                    @foreach($camera->categories as $category)
                        <li>{{$category->name}}</li>
                    @endforeach
                </div>
                <label for=""><b>Camera Brand</b></label>
                <div class="form-group">
                    {{$camera->brands->name}}
                </div>
            </div>
        </div>
    </div>
@endsection