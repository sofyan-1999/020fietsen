@php
    $categories = DB::table('categories')->orderBy('name', 'asc')->get();
    $products = DB::table('products')->where('home', '=', 1)->get();
@endphp
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Account</title>
    <meta charset="utf-8">
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
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
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
    <!-- Page Header-->
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a href="{{URL::asset('/')}}"><img class="brand-logo-light" src="{{URL::asset('/images/logo.png')}}" alt="header image" width="140" height="57"/></a></div>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{URL::asset('/')}}">Home</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="{{URL::asset('/about')}}">Over ons</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{URL::asset('/openinghours')}}">Openingstijden</a>
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
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{URL::asset('/contact')}}">Contact</a>
                                    </li>
                                </ul>
                                <a class="button button-white button-sm hidden-button">book now</a>
                            </div>
                        </div>
                        <a class="button button-white button-sm hidden-button">book now</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="parallax-container overlay-1" data-parallax-img="{{URL::asset('/images/photo.jpg')}}">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <h4 class="breadcrumbs-custom-title">Welkom {{ \Illuminate\Support\Facades\Auth::user()->firstname }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row pt-4">
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;height: 10rem;">
                    <div class="card-body">
                        <a href="{{ url('/account/edit') }}">
                            <h5 class="card-title">Gegevens wijzigen</h5>
                            <p class="card-text">Wijzig je gegevens.</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card" style="width: 18rem;height: 10rem;">
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">Bestellingen/Aankopen</h5>
                            <p class="card-text">Bekijk al je bestellingen en aankopen.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="{{URL::asset('/js/core.min.js')}}"></script>
<script src="{{URL::asset('/js/script.js')}}"></script>
</body>
</html>
