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
                <form enctype="multipart/form-data" class="bg-white p-3" action="{{route('brand.store')}}"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Brand Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Brand Logo</label>
                        <div class="custom-file">
                            <input type="file" multiple class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02"
                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
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