<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" href="{{asset('image/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-free-5.5.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-free-5.5.0-web/js/all.js')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/sweetalert/dist/sweetalert.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script>
        $(document).ready(function () {
            @yield('tambah-script')
            $(".card").hover(
                function () {
                    $(this).addClass('shadow').css('cursor', 'pointer');
                }, function () {
                    $(this).removeClass('shadow');
                }
            );
        });
    </script>
</head>

<body>
<header>
    <!-- top -->
    <div class="topbar navbar fixed-top">
        <!--Logo-->
        <div class="logo px-2 d-flex">
            <a href="/">
                <img src="{{asset('image/camcamheader.png')}}" width="150" alt="CamCam">
            </a>
        </div>
        <!--Navbar-->
        <div class="d-flex">
            <nav class="navbar navbar-expand-sm bg-white">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"><strong>HOME</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('catalog')}}"><strong>CATALOG</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}"><strong>ABOUT US</strong></a>
                    </li>

                </ul>
            </nav>
        </div>
        <!--Search-->
        <div class="d-flex">
            <form class="input-group" action="{{route('hasil')}}">
                <span class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                </span>
                <input class="form-control" value="{{Request::get('name')}}" type="text" name="name" placeholder="Search on CamCam...">
            </form>
            {{--<form class="input-group" action="{{route('hasil')}}">--}}
                {{--<input class="form-control" value="{{Request::get('name')}}" name="name" type="text"--}}
                       {{--placeholder="Search on CamCam...">--}}
                {{--<button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-search"></span></button>--}}
            {{--</form>--}}
        </div>
        <!--Navbar Login & Signup-->
        <div class="d-flex">

            <nav class="navbar navbar-expand-sm ">
                @guest
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">LOGIN |
                                REGISTER</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="login()">Wishlist <span><i
                                            class="fas fa-heart"></i></span></a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('user.edit',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"
                                   class="dropdown-item">Settings</a>
                                <a href="{{route('showOrder')}}" class="dropdown-item">Order Details</a>
                                @if(Auth::user()->type == "admin")
                                    <a class="dropdown-item" href="{{route('home')}}">Admin Panel</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('wishlist.index')}}">Wishlist <span><i
                                            class="fas fa-heart"></i></span></a>
                        </li>
                    </ul>

                @endguest
            </nav>
        </div>
    </div>
</header>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content rounded-1">
            <div class="card" id="login-form">
                <div class="card-header header-login">
                    <h3 class="mb-0 text-center">LOGIN</h3>
                </div>
                <div class="card-body">
                    <div class="login-logo">
                        <img class="mx-auto d-block" src="{{asset('image/Logo.png')}}" width="100px">
                    </div>
                    <div class="login-form">
                        <form action="{{route('login')}}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="email"
                                       id="username" value="{{old('username')}}"
                                       required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="btn-group-vertical w-100">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" name="btnLogin"
                                        id="btnLogin">Login
                                </button>
                                <a href="#" id="btn-dont-have" class="btn btn-outline-primary btn-sm w-100">Dont
                                    Have Account</a>
                            </div>
                        </form>
                    </div>
                    <div class="regist-form">
                        <form class="form" action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username"
                                       id="username"
                                       required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" id="name"
                                       required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       id="email"
                                       required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password verification</label>
                                <input type="password" class="form-control form-control-lg rounded-1"
                                       id="password_confirmation"
                                       name="password_confirmation" required>

                            </div>
                            <div class="btn-group-vertical w-100">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" name="btn-regist"
                                        id="btn-regist">Register
                                </button>
                                <a href="#" id="btn-have" class="btn btn-outline-primary btn-sm w-100">Have Account</a>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

        </div>

    </div>
</div>
@yield('content')
{{--<footer class="footer font-small pt-4" style="background-color: #F0F8FF">--}}
    {{--<div class="container text-center text-md-left">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<h3>Links</h3>--}}
                {{--<hr>--}}
                {{--<div class="list-group">--}}
                    {{--<a href="/" class="list-group-item list-group-item-action">Home</a>--}}
                    {{--<a href="{{route('catalog')}}" class="list-group-item list-group-item-action">Catalog</a>--}}
                    {{--<a href="{{route('about')}}" class="list-group-item list-group-item-action">About Us</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2"></div>--}}
            {{--<div class="isi-footer col-md-6 mt-md-0 mt-3 text-right">--}}
                {{--<h5 class="text-uppercase"><img src="{{asset('image/Logo.png')}}" alt="" style="width: 50px;"> CamCam.--}}
                {{--</h5>--}}
                {{--<p>Here our website that made with much of our love. <i class="fas fa-heart"></i></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="footer-copyright text-center py-3">© 2018 Copyright:--}}
        {{--<a href="#"> CamCam.com</a>--}}
    {{--</div>--}}
{{--</footer>--}}
<footer class="bg-dark text-white mt-5 " id="footer">
    <div class="container pt-3 pb-3 pt-md-5 pb-md-5">
        <div class="row mb-2">
            <div class="col-md-6 mr-auto">
                <h2 class="brand-budayaku brand-lg"><img src="{{asset('image/Logo.png')}}" alt="" style="width: 70px"> | CamCam</h2>
                <p class="mt-2">You Can Find Any Camera With Us!</p>
            </div>
            <div class="col-md-3">
                <h3 class="heading-footer">Learn More</h3>
                <li class="learn-more"><a href="{{route('about')}}">Apa itu CamCam?</a></li>
                <li class="learn-more"><a href="{{route('catalog')}}">Katalog</a></li>
                <li class="learn-more"><a href="#">Syarat dan Ketentuan</a></li>
                <li class="learn-more"><a href="#">Kebijakan Privasi</a></li>
            </div>
            <div class="col-md-3">
                <h3 class="heading-footer">Stay Connect!</h3>
                <div class="sosmed-button mb-3 mt-3">
                    <a href="#"><span class="social-footer fab fa-facebook"></span></a>
                    <a href="#"><span class="social-footer fab fa-twitter"></span></a>
                    <a href="#"><span class="social-footer fab fa-instagram"></span></a>
                    <a href="#"><span class="social-footer fab fa-twitch"></span></a>
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('script-bawah')
@stack('js')
<script src="{{asset('js/myjs.js')}}"></script>
<script>
    function login() {
        $('#loginModal').modal('show');
    };
</script>
</body>
</html>