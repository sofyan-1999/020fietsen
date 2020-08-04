@php
$countProducts = 0;
if(isset($_SESSION['cart'])){
    $countProducts = count($_SESSION['cart']['products']);
}
@endphp
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>020 Fietsen - Goedkope fietsen in Amsterdam</title>
        <meta charset="utf-8">
        <meta name="description" content="Ons fietsenwinkel biedt een groot voorraad aan goedkope fietsen. Verschillende A-merken waaronder Gazelle, Sparta, Batavus, Giant en vele anderen."/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/images/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/images/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/images/favicon-16x16.png')}}">
        <link rel="manifest" href="{{URL::asset('/images/site.webmanifest')}}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('/css/fonts.css')}}">
        <link rel="stylesheet" href="{{URL::asset('/css/style.css')}}">
    </head>
    <body>
        <div class="preloader">
            <div class="preloader-body">
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"></div>
                </div>
            </div>
        </div>
        <div class="page">
            <header class="section page-header">
                <!-- RD Navbar-->
                <div class="rd-navbar-wrap">
                    <nav  style="background: #323232;" class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                        <div class="rd-navbar-main-outer">
                            <div class="rd-navbar-main">
                                <!-- RD Navbar Panel-->
                                <div class="rd-navbar-panel">
                                    <!-- RD Navbar Toggle-->
                                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                    <!-- RD Navbar Brand-->
                                    <div class="rd-navbar-brand"><a href="{{URL::asset('/')}}"><img class="brand-logo-light" src="{{URL::asset('/images/logo.png')}}" alt="" width="140" height="57"/></a></div>
                                </div>
                                <div class="rd-navbar-main-element">
                                    <div class="rd-navbar-nav-wrap">
                                        <!-- RD Navbar Nav-->
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="rd-nav-link" href="{{URL::asset('/')}}">Home</a>
                                            </li>
                                            <li class="rd-nav-item {{ Request::is('about') ? 'active' : '' }}"><a class="rd-nav-link" href="{{URL::asset('/about')}}">Over ons</a>
                                            </li>
                                            <li class="rd-nav-item {{ Request::is('openinghours') ? 'active' : '' }}"><a class="rd-nav-link" href="{{URL::asset('/openinghours')}}">Openingstijden</a>
                                            </li>
                                            <li class="rd-nav-item">
                                                <a class="rd-nav-link dropdown-toggle" href="{{URL::asset('/products')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Fietsen
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    @foreach($categories as $category)
                                                    <a class="dropdown-item" href="{{URL::asset('/products/' . $category->id)}}">{{$category->name}}</a>
                                                    @endforeach
                                                </div>
                                            </li>
                                            <li class="rd-nav-item {{ Request::is('contact') ? 'active' : '' }}"><a class="rd-nav-link" href="{{URL::asset('/contact')}}">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="rd-navbar-nav-wrap">
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item {{ Request::is('shoppingCart') ? 'active' : '' }}">
                                            <a class="rd-nav-link" href="{{URL::asset('/shoppingCart')}}">
                                                <i class="fa" style="font-size:30px">&#xf07a;</i>
                                                <span class='badge badge-warning' id='lblCartCount'> {{$countProducts}} </span>
                                            </a>
                                        </li>
                                        @if(Auth::check())
                                        <li class="rd-nav-item"><a href="{{ route('logout') }}" class="rd-nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Uitloggen
                                        </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                        </form>
                                        @else
                                        <li class="rd-nav-item {{ Request::is('login') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route ('login') }}">Inloggen</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            @yield('content')
            <footer class="section footer-minimal context-dark">
                <div class="container wow-outer">
                    <div class="wow fadeIn">
                        <div class="row row-60">
                            <div class="col-12"><a href="{{URL::asset('/')}}"><img src="{{URL::asset('/images/logo.png')}}" alt="logo" width="140" height="57"/></a></div>
                            <div class="col-12">
                                <ul class="footer-minimal-nav">
                                    <li><a href="{{URL::asset('/')}}">Home</a></li>
                                    <li><a href="{{URL::asset('/about')}}">Over ons</a></li>
                                    <li><a href="{{URL::asset('/openinghours')}}">Openingstijden</a></li>
                                    <li><a href="{{URL::asset('/products')}}">Fietsen</a></li>
                                    <li><a href="{{URL::asset('/contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="rights"><span>&copy;&nbsp;</span><span>020 Fietsen</span><span>&nbsp;</span><span class="copyright-year"></span></p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="{{URL::asset('/js/core.min.js')}}"></script>
        <script src="{{URL::asset('/js/script.js')}}"></script>
    </body>
</html>
