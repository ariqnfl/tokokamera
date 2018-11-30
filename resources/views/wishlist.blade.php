@extends('global')
@section('title')
    Wishlist
@endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card rounded-5">
                    <div class="card-header">
                        <h5>Your Whistlist</h5>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->wishlist->count() )
                            @foreach ($wishlists as $wishlist)
                                <div class="whislist-item row">
                                    <div class="col-md-3">
                                        <div class="foto-barang-whistlist">
                                            <img src="{{asset('storage/'.$wishlist->camera->photo)}}" alt=""
                                                 width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>{{$wishlist->camera->name}}</h5>
                                        <small>{{$wishlist->camera->brands->name}}</small>
                                        <br>
                                        <strong>Rp. {{number_format($wishlist->camera->price)}}</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-success" href="{{route('shop',['id'=> $wishlist->camera->id])}}" ><span class="fas fa-shopping-cart"></span></a>
                                            <form action="{{route('wishlist.destroy',['id'=>$wishlist->id])}}" method="POST" onsubmit="return confirm('Delete this brand permanently?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger" type="submit"><span class="fas fa-trash-alt"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection