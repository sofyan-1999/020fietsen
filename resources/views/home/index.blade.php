@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
$products = DB::table('products')->where('home', '=', 1)->get();
@endphp
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>Home</title>
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
                                    <div class="rd-navbar-brand"><a href="{{URL::asset('/')}}"><img class="brand-logo-light" src="{{URL::asset('/images/logo.png')}}" alt="" width="140" height="57"/></a></div>
                                </div>
                                <div class="rd-navbar-main-element">
                                    <div class="rd-navbar-nav-wrap">
                                        <!-- RD Navbar Nav-->
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item active"><a class="rd-nav-link" href="{{URL::asset('/')}}">Home</a>
                                            </li>
                                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{URL::asset('/about')}}">Over ons</a>
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
                                            <li class="rd-nav-item">
                                                @if(Auth::check())
                                                    <a class="rd-nav-link" href="{{ url('account') }}">Account</a>
                                                    <form method="POST" id="logout-form" action="{{ route ('logout') }}">@csrf</form>
                                                    <a class="rd-nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Uitloggen</a>
                                                @else
                                                    <a class="rd-nav-link" href="{{ route ('login') }}">Inloggen</a>
                                                    <a class="rd-nav-link" href="{{ route ('register') }}">Registreren</a>
                                                @endif
                                            </li>
                                        </ul>
                                        <a class="button button-white button-sm hidden-button">book now</a>
                                    </div>
                                </div>
                                @if (Auth::check())
                                @if(Auth::user()->role_id == 1)
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button button-white button-sm">
                                Uitloggen
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endif
                                @endif
                                <a class="button button-white button-sm hidden-button">book now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
                <div class="main-bunner-img" style="background-image: url(&quot;images/home.png&quot;); background-size: cover;"></div>
                <div class="main-bunner-inner">
                    <div class="container">
                        <div class="box-default">
                            <h1 class="box-default-title">Welkom</h1>
                            <div class="box-default-decor"></div>
                            <p class="big box-default-text">Ons fietsenwinkel biedt een groot voorraad aan goedkope fietsen.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Featured Offers-->
            <section class="section section-lg bg-default">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-9 col-lg-7 wow-outer">
                            <div class="wow slideInDown">
                                <h2>Categorieën
                                    @if (Auth::check())
                                    @if(Auth::user()->role_id == 1)
                                    <a href="{{URL::asset('/category/create')}}">
                                    <button type="button" class="btn btn-primary">+</button>
                                    </a>
                                    @endif
                                    @endif
                                </h2>
                                <p class="text-opacity-80">Wij bieden een grote verscheidenheid aan fietsen aan onze bezoekers en gasten. Hieronder staan ​​enkele van onze categorieën.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row row-20 row-lg-30">
                        @foreach($categories as $category)
                        <div class="col-md-6 col-lg-4 wow-outer">
                            <div class="wow fadeInUp">
                                <div class="product-featured">
                                    <div class="product-featured-figure">
                                        <img src="{{asset('storage/'.$category->image)}}" alt="" width="370" height="395"/>
                                        <div class="product-featured-button"><a class="button button-primary" href="{{URL::asset('/products/' . $category->id)}}">Bekijk</a></div>
                                    </div>
                                    <div class="product-featured-caption">
                                        <h4><a class="product-featured-title" href="{{URL::asset('/products/' . $category->id)}}">{{$category->name}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                        @if(Auth::user()->role_id == 1)
                        <div class="top-corner">
                            <a href="{{URL::asset('/categories/' . $category->id . '/edit')}}"><button class="btn btn-info btn-small"><i class="material-icons icon-margin">&#xe254;</i></button></a>
                            {{ Form::open(array('url' => 'categories/' . $category->id, 'class' => 'pull-right delete')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('X', array('class' => 'btn btn-color')) }}
                            {{ Form::close() }}
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="section section-lg bg-default">
                <div class="container">
                    <h2 class="text-center">Aanbevolen producten
                        @if (Auth::check())
                        @if(Auth::user()->role_id == 1)
                        <a href="{{URL::asset('/products/create')}}">
                        <button type="button" class="btn btn-primary">+</button>
                        </a>
                        @endif
                        @endif
                    </h2>
                    <div class="row row-20 row-lg-30">
                        @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 wow-outer">
                            <div class="wow fadeInUp">
                                <div class="product-featured">
                                    <div class="product-featured-figure">
                                        {{--<img src="{{asset('storage/'.$product->image)}}" alt="" width="370" height="395"/>--}}
                                        <div class="product-featured-button"><a class="button button-primary" href="{{URL::asset('/product/' . $product->id)}}">Bekijk</a></div>
                                    </div>
                                    <div class="product-featured-caption">
                                        <h4><a class="product-featured-title" href="{{URL::asset('/product/' . $product->id)}}">{{$product->title}}</a></h4>
                                        <h4><a class="product-featured-title price" href="{{URL::asset('/product/' . $product->id)}}">€{{$product->price}},-</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                        @if(Auth::user()->role_id == 1)
                        <div class="top-corner">
                            <a href="{{URL::asset('/products/' . $product->id . '/edit')}}"><button class="btn btn-info btn-small"><i class="material-icons icon-margin">&#xe254;</i></button></a>
                            {{ Form::open(array('url' => 'products/' . $product->id, 'class' => 'pull-right delete')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('X', array('class' => 'btn btn-color')) }}
                            {{ Form::close() }}
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                <center>
                    <a href="{{URL::asset('/products')}}" class="show-more-products">Bekijk meer producten <i class="fa">&#xf061;</i></a>
                </center>
            </section>
            <!-- Page Footer-->
            <footer class="section footer-minimal context-dark">
                <div class="container wow-outer">
                    <div class="wow fadeIn">
                        <div class="row row-60">
                            <div class="col-12"><a href="{{URL::asset('/')}}"><img src="{{URL::asset('/images/logo.png')}}" alt="" width="140" height="57"/></a></div>
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
        <script src="{{URL::asset('/js/functions.js')}}"></script>
    </body>
</html>
