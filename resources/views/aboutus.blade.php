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
            <div class="row justify-content-md-center">
                <div class="col-md-4 mb-4 ">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('image/IMG_1544.jpg')}}" alt="" height="350px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Muhammad Ariq Naufal</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Back-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">nflariq17@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('image/banna.jpg')}}" alt="" height="350px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Ahmad Al-Banna</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Front-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">ahmed.albanna98@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4 mb-4 ">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('image/tisa.jpg')}}" alt="" height="350px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Anastisya Dratina</h4>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">anastisya@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('image/1.jpg')}}" alt="" height="350px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Rosalia Endri Sintia</h4>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">rosaliaens@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('image/kesya.jpg')}}" alt="" height="350px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Kesya Asih Zarinisa</h4>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">kesyaaz@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection