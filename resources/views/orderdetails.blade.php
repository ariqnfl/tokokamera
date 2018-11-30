@extends('global')
@section('title')CamCam | Order History @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>Your Orders</h1>
        <hr>
        <!--Order Item-->
        <div class="row shadow p-2 m-3">
            @if(Auth::user()->orders->count())
                @foreach($orders as $item)
                    @foreach($item->cameras as $data)
                        <div class="col-md-2 text-center border">
                            <img class="w-75" src="{{asset('storage/'.$data->photo)}}" alt="">
                        </div>
                        <div class="col-md-5 border">
                            <ul class="list-group ">
                                <li class="border-0 list-group-item"><strong>{{$data->name}}</strong></li>
                                <li class="border-0 list-group-item"><strong>{{$data->created_at}}</strong>|
                                    Rp. {{number_format($data->price)}}</li>
                            </ul>
                        </div>
                        <div class="col-md-5 border">
                            <ul class="list-group ">
                                <li class="border-0 list-group-item"><strong>Status</strong></li>
                                @if($item->status == "cancel")
                                    <li class="border-0 list-group-item list-group-item-danger">Pesanan Dibatalkan</li>
                                @elseif($item->status == "process")
                                    <li class="border-0 list-group-item list-group-item-primary">Pesanan Sedang di
                                        Proses
                                    </li>
                                @else
                                    <li class="border-0 list-group-item list-group-item-success">Pesanan Telah Diantar</li>
                                @endif
                            </ul>
                        </div>
                    @endforeach
                @endforeach
            @endif

        </div>
    </div>
@endsection
