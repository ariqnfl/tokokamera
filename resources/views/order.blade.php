@extends('global')
@section('title')CamCam | Order {{$camera->name}}@endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <div class="row">
            <!--Input data pembeli-->
            <div class="col-sm-8 p-2">
                <div class="card w-100 pb-4">
                    <div class="card-header">
                        <h5>Detail Pembeli</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-group w-100">
                            <a id="buy-no-reg" href="#" class="nav-order-card  w-50 btn btn-primary btn-sm active">BELI
                                TANPA DAFTAR</a>
                            <a id="buy-login" href="#" class="nav-order-card w-50 btn btn-primary btn-sm"> LOGIN</a>
                        </div>
                        <div class="form-with-login">
                            <form action="">
                                <label class="mt-2" for="username">Username</label>
                                <input type="text" class="form-control" id="username">
                                <label class="mt-2" for="pwd">Password</label>
                                <input type="password" class="form-control" id="pwd">
                                <input class="btn btn-success p-2 my-2 w-25" type="button" value="Login">
                            </form>
                        </div>
                        <div class="form-without-login">
                            <form id="form-no-login" action="{{route('order.store')}}" class="form-group" method="post">
                                @csrf
                                @if(Auth::check())
                                    <label class="mt-2" for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="Nama" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                    <label class="mt-2" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                    <label class="mt-2" for="noTelp">No Telpon</label>
                                    <input type="text" class="form-control" id="noTelp" name="phone">
                                    <label class="mt-2" for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" rows="5" name="address"></textarea>
                                    <input type="hidden" value="{{$camera->price}}" name="totalPrice">
                                    <input type="hidden" name="camera_id" value="{{ $camera->id }}">
                                    <input type="hidden" value=1 name="stockminus">
                                @else
                                    <label class="mt-2" for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="Nama" name="name">
                                    <label class="mt-2" for="email">Email</label>
                                    <input type="text" class="form-control" id="email">
                                    <label class="mt-2" for="noTelp">No Telpon</label>
                                    <input type="text" class="form-control" id="noTelp" name="phone">
                                    <label class="mt-2" for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" rows="5" name="address"></textarea>
                                    <input type="hidden" value="{{$camera->price}}" name="totalPrice">
                                    <input type="hidden" name="camera_id" value="{{ $camera->id }} ">
                                    <input type="hidden" value=1 name="stockminus">
                                @endif
                            </form>
                        </div>


                    </div>
                </div>
                <div class="card w-100 pb-4">
                    <div class="card-header">
                        <h5>Detail Belanja</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" id="item">
                            <div class="row">
                                <div class="col-4 image-item">
                                    <img src="{{asset('storage/'.$camera->photo)}}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-8">
                                    <h3>{{$camera->name }}</h3>
                                    <h5>{{$camera->brands->name}}</h5>
                                    @foreach($camera->categories as $category)
                                        <h5>{{$category->name}}</h5>
                                    @endforeach
                                    <h5><strong>Rp. {{number_format($camera->price)}}</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Ringkasan belanja-->
            <div class="col-sm-4 p-2 ">
                <div class="card total-pembayaran sticky ">
                    <div class="card-header">
                        <h5>Ringkasan Belanja</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6"><strong>TOTAL</strong></div>
                            <div class="col-sm-6 text-right"><strong>Rp.{{number_format($camera->price)}}</strong></div>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-success w-100" value="Bayar" form="form-no-login"
                               onclick="klik()">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function () {

            $(".form-with-login").hide();

            $("#buy-no-reg").click(function () {
                $(".form-without-login").show();
                $(".form-with-login").hide();
                $(this).addClass("active");
                $("#buy-login").removeClass("active")
            });

            $("#buy-login").click(function () {
                $(".form-without-login").hide();
                $(".form-with-login").show();
                $(this).addClass("active");
                $("#buy-no-reg").removeClass("active")
            });
        });

        function klik() {
            swal({
                title: "Order Success!",
                text: "Thank You For Ordering!",
                icon: "success",
                button: "OK",
            });
        }

    </script>
@endsection