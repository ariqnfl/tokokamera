@extends('layouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
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
                <form enctype="multipart/form-data" class="bg-white p-3" action="{{route('camera.store')}}"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Camera Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Camera Description</label>
                        <textarea name="desc" id="" class="form-control"
                                  placeholder="Give Description about this camera"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Camera Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="price" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Camera Stock</label>
                        <div class="input-group">
                            <input type="number" name="stock" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select name="categories[]" multiple id="categories" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="">Camera Brands</label>
                        <select name="brand_id" id="brands" class="form-control">
                            <option selected>Choose...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Camera Picture</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="photo">
                                <label class="custom-file-label" for="inputGroupFile02"
                                       aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
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
    </script>
@endsection