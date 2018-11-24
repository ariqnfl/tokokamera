@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <form class="bg-white shadow-sm p-3"
              action="{{route('order.update', ['id'=>$order->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Order ID</label>
                <input type="text" value="{{$order->id}}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$order->name}}" class="form-control" disabled type="text"/>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="" id="" disabled class="form-control">{{$order->address}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Order Status</label>
                <br>
                <input {{$order->status == "cancel" ? "checked" : ""}}  value="cancel" type="radio" class=""
                       id="cancel" name="status">
                <label for="cancel">Cancel</label>
                <input {{$order->status == "process" ? "checked" : ""}}  value="process" type="radio"
                       class=""
                       id="process" name="status">
                <label for="process">Process</label>
                <input {{$order->status == "delivered" ? "checked" : ""}}  value="delivered" type="radio"
                       class=""
                       id="delivered" name="status">
                <label for="delivered">Delivered</label>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Save"/>
            </div>
        </form>
    </div>
@endsection