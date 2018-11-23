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
                    <h5><strong>Rp. {{$camera->price}},00</strong></h5>
                    <div class="card desc">
                        <div class="card-header">Description</div>
                        <div class="card-body">
                            <p>{{$camera->desc}}</p>
                        </div>
                    </div>
                    <a class=" btn btn-success" href="{{route('shop',['id'=> $camera->id])}}">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
@endsection