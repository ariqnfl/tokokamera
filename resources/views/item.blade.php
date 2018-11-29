@extends('global')
@section('title')CamCam | {{$camera->name}} @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <div id="item">
            <div class="row">
                <div class="col-6 image-item">
                    <img src="{{asset('storage/'.$camera->photo)}}" alt="" class="img-thumbnail w-100">
                </div>
                <div class="col-6">
                    <h3>{{$camera->name}} </h3>
                    @foreach($camera->categories as $category)
                        <h5>{{$category->name}}</h5>
                    @endforeach
                    <h5><strong>Rp. {{number_format($camera->price)}}</strong></h5>
                    @if($camera->stock >=1 && $camera->stock < 5 )
                        <span class="badge badge-warning badge-pill">Last Stock</span>
                    @elseif($camera->stock == 0)
                        <span class="badge badge-danger">Habis</span>
                    @else
                    @endif
                    <div class="card desc">
                        <div class="card-header">Description</div>
                        <div class="card-body">
                            <p>{{$camera->desc}}</p>
                        </div>
                    </div>
                    @if($camera->stock == 0)
                        <a class=" btn btn-success" href="#" onclick="habis()">Beli Sekarang</a>
                    @else
                        <a class=" btn btn-success" href="{{route('shop',['id'=> $camera->id])}}">Beli Sekarang</a>
                    @endif
                    @if(Auth::check())
                        <a class="btn btn-danger"
                           href="{{ route('mywish',['id'=> Auth::user()->id,'camera'=> $camera->id]) }}"><span><i
                                        class="fas fa-heart">
                            </i></span></a>
                    @else
                        <a class="btn btn-danger"
                           href="#" onclick="login()"><span><i class="fas fa-heart"></i></span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function login() {
            $('#loginModal').modal('show');
        };
        function habis() {
            swal("Gagal!", "Barang Sudah Habis!", "error");
        }
    </script>
@endpush