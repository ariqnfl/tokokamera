@extends('layouts.global')
@section('title') Edit Book @endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
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
                <label for="slug">Slug</label>
                <input type="text" class="form-control" value="{{$book->slug}}" name="slug" placeholder="enter-a-slug">
                <br>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">
                    {{$book->description}}
                </textarea>
                <br>
                <label for="categories">Categories</label>
                <select multiple class="form-control" name="categories" id="categories"></select>
                <br><br>
                <label for="stock">Stock</label>
                <br>
                <input type="number" class="form-control" placeholder="Stock" id="stock" name="stock"
                       value="{{$book->stock}}">
                <br>
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" placeholder="Author"
                       value="{{$book->author}}">
                <br>
                <label for="publisher">Publisher</label>
                <input class="form-control" type="text" placeholder="Publisher" name="publisher" id="publisher"
                       value="{{$book->publisher}}">
                <br>
                <label for="price">Price</label>
                <input class="form-control" type="number" placeholder="Price" name="price" id="price"
                       value="{{$book->price}}">
                <br>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$book->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
                    <option {{$book->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT"></option>
                </select>
                <br>
                <button class="btn btn-primary" value="PUBLISH">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
        var categories = {!! $book->categories !!}
        categories.forEach(function (category) {
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
    </script>
@endsection