@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Camera</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form enctype="multipart/form-data" class="bg-white p-3" action="{{route('camera.store')}}" method="POST">
                    @csrf
                    <label for="">Camera Name</label>
                    <input type="text" class="form-control" name="name">
                    <br>
                    <label for="">Camera Description</label>
                    <textarea name="desc" id="" class="form-control" placeholder="Give Description about this camera"></textarea>
                    <br>
                    <label for="">Camera Price</label>
                    <input type="number" name="price" class="form-control">
                    <br>
                    <label for="">Camera Stock</label>
                    <input type="number" name="stock" class="form-control">
                    <br>
                    <label for="">Camera Categories</label>
                    <select name="categories[]" multiple id="categories" class="form-control"></select>
                    <br><br>
                    <label for="">Camera Brands</label>
                    <select name="brands[]" id="brands" class="form-control"></select>
                    <br><br>
                    <label for="">Camera Picture</label>
                    <input type="file" class="form-control" name="photo">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection