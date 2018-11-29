@extends('global')
@section('title')CamCam | Catalog
@endsection
@section('tambah-script')
    $("#filter-item-brand").hide();
    $("#filter-item-cat").hide();

    $("#filter-brand").click(function () {
    $("#filter-item-brand").slideToggle("slow");
    });
@endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <div class="filter mb-5">
            <button type="button" class="btn btn-outline-primary btn-block btn-sm" data-toggle="modal"
                    data-target="#myModal">
                Filter
            </button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Filter</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div id="filter-brand" class="card-header">Brands</div>
                                <div class="card-body" id="filter-item-brand">
                                    <div class="filter-shopbybrand">
                                        @foreach($brands as $brand)
                                            <a href="{{route('catalog',['brand' => $brand->id])}}">
                                                <img src="{{asset('storage/'.$brand->photo)}}" alt="{{$brand->name}}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="filter-cat" class="card-header">Category</div>
                                <div class="card-body" id="filter-item-cat">
                                    <div class="filter-shopbybrand">
                                        <ul class="nav flex-column">
                                            @foreach($categories as $category)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('catalog',['category'=> $category->id])}}">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="row">
                @foreach($camera as $item)
                    <div class="card m-1" style="width: 23%">
                        <a class="item-link" href="{{route('showdata',['id'=> $item->id])}}">
                            <div class="product-card-body card-body">
                                <h5 class="card-title truncate">{{$item->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$item->brands->name}}</h6>
                                <img class="card-img" src="{{asset('storage/'.$item->photo)}}" alt="">
                                <h5 class="card-title">Rp. {{number_format($item->price)}}</h5>
                                <a href="#" class="btn btn-outline-primary btn-sm w-100 text-center"><i
                                            class="fas fa-cart-plus fa-2x"></i></a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function () {
            $("#filter-cat").click(function () {
                $("#filter-item-cat").slideToggle("slow");
            });
        });
    </script>
@endsection