@extends('global')
@section('title')CamCam | About Us @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>
            About Us
        </h1>
        <hr>
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>
                    CamCam
                </h2>
                <p>
                    Website Camcam yang dibuat karena website Camcam ini dibuat untuk menjual produk kamera dengan
                    berbagai merek terkenal yang terjamin original dan terpercaya, didesign dinamis sehingga membuat
                    customer nyaman dalam berbelanja online ditoko Camcam dan Camcam juga merupakan website yang mudah
                    digunakan dan dipahami oleh berbagai kalangan khususnya kalangan muda yang ingin berkunjung ke
                    halaman website Camcam. Oleh karena itu pembuatan website ini dirasa sangat penting, terutama focus
                    targetnya pada kalangan muda dan pecinta photography.
                </p>
            </div>
            <div class="col-md-4">
                <img class="img-thumbnail w-100" src="{{asset('image/store.jpg')}}" alt="">
            </div>
            <div class="col-md-2">
                <img class="w-100" src="{{asset('image/Logo.png')}}" alt="">
            </div>
        </div>
    </div>
@endsection