@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <div class="card">
        <div class="card-header">
            Edit {{$camera->name}}
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form enctype="multipart/form-data" method="POST" action="{{route('camera.update',['id' => $camera->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Camera Name</label>
                    <input type="text" class="form-control" value="{{$camera->name}}" name="name"
                           placeholder="Camera name">
                </div>
                <div class="form-group">
                    <label for="cover">Camera Picture</label>
                    <div class="form-group">
                        <small class="text-muted">Current Photo</small>
                    </div>
                    <div class="form-group">
                        @if($camera->photo)
                            <img src="{{asset('storage/' . $camera->photo)}}" width="96px">
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="photo">
                            <label class="custom-file-label" for="inputGroupFile02"
                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{$camera->desc}}
                </textarea>
                </div>
                <div class="form-group">
                    <label for="categories">Camera Categories</label>
                    <select class="form-control" name="categories" id="categories" multiple></select>
                </div>
                <div class="form-group">
                    <label for="brands">Camera Brand</label>
                    <select class="form-control" name="brands" id="brands"></select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <label for="">Camera Stock</label>
                    <div class="input-group">
                        <input type="number" name="stock" class="form-control" value="{{$camera->stock}}">
                        <div class="input-group-append">
                            <span class="input-group-text">pcs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Camera Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" name="price" class="form-control" value="{{$camera->price}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" value="PUBLISH">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('footer-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#inputGroupFile02').on('change', function (e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
    <script>
        $('#categories').select2({
            ajax: {
                url: '{{ route('ajax.search') }}',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            console.log(item);
                            return {
                                id: item.id, text: item.name
                            }

                        })
                    }
                }
            }
        });
        var categories = {!! $camera->categories !!}
        categories.forEach(function (category) {
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
    </script>
    <script>
        $('#brands').select2({
            ajax: {
                url: '{{ route('ajax-brand.search') }}',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            console.log(item);
                            return {
                                id: item.id, text: item.name
                            }

                        })
                    }
                }
            }
        });
        var brands = {!! $camera->brand_id !!}
        brands.forEach(function (brand) {
            var option = new Option(brand.name, brand.id, true, true);
            $('#brands').append(option).trigger('change');
        });
    </script>
@endsection