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
                    <div class="form-group">
                        <label for="">Brand Name</label>
                        <input type="text" class="form-control" value="{{$brand->name}}" name="name">
                    </div>
                    <div class="form-group">
                        @if($brand->photo)
                            <span>Current Logo</span>
                            <div class="form-group">
                                <img src="{{asset('storage/'.$brand->photo)}}" width="120px">
                            </div>

                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="photo">
                            <label class="custom-file-label" for="inputGroupFile02"
                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    <script>
        $('#inputGroupFile02').on('change', function (e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection