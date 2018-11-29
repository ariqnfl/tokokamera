@extends('global')
@section('title')CamCam | Home @endsection
@section('content')
    <!--container-->
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <!--Shop By Categories-->
        <div class="shopby">
            <div class="row">
                <a class="shopbyitem col-sm-6" href="/kategori?category=2">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/shopby/DSLR_.jpg')}}">
                    <div class="tagshopby">
                        <h5>SHOP DSLR CAMERA</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="kategori?category=3">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/shopby/Mirrorless_.jpg')}}">
                    <div class="tagshopby">
                        <h5>SHOP MIRRORLESS CAMERA</h5>
                    </div>
                </a>
            </div>
            <div class="row">
                <a class="shopbyitem col-sm-6" href="kategori?category=5">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/shopby/Compact_.jpg')}}">
                    <div class="tagshopby">
                        <h5>SHOP COMPACT CAMERA</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="kategori?category=4">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/shopby/Accessories_.jpg')}}">
                    <div class="tagshopby">
                        <h5>SHOP ACCESSORIES CAMERA</h5>
                    </div>
                </a>
            </div>
            <!--Shop by Brands-->
            <div class="brandtext">
                <h4>SHOP BY BRAND</h4>
            </div>
            <div class="shopbybrand">
                @foreach($brands as $brand)
                    <a href="{{route('catalog',['brand' => $brand->id])}}">
                        <img src="{{asset('storage/'.$brand->photo)}}" alt="{{$brand->name}}">
                    </a>
                @endforeach
            </div>
        </div>
        <!--Featured Product-->
        <div class="feat-product-text">
            <h4>FEATURED PRODUCT</h4>
        </div>
        <div id="item" class="row">
            @foreach($camera as $item)
                <div class="card m-1" style="width: 23%">
                    <a class="item-link" href="#">
                        <div class="product-card-body card-body">
                            <h5 class="card-title truncate">{{$item->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$item->brand}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$item->category}}</h6>
                            <a href="{{route('gambar',['id'=> $item->id])}}">
                                <img class="card-img" src="{{asset('storage/'.$item->photo)}}" alt="">
                            </a>
                            <h5 class="card-title">Rp. {{number_format($item->price)}}</h5>
                            <a href="" class="btn btn-outline-primary btn-sm w-100 text-center"><i
                                        class="fas fa-cart-plus fa-2x"></i></a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection