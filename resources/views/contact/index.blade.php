@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>Contact</title>
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
                                    <div class="rd-navbar-brand"><a href="{{URL::asset('/')}}"><img class="brand-logo-light" src="{{URL::asset('/images/logo.png')}}" alt="logo" width="140" height="57"/></a></div>
                                </div>
                                <div class="rd-navbar-main-element">
                                    <div class="rd-navbar-nav-wrap">
                                        <!-- RD Navbar Nav-->
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{URL::asset('/')}}">Home</a>
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
                                            <li class="rd-nav-item active"><a class="rd-nav-link" href="{{URL::asset('/contact')}}">Contact</a>
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
                            <div class="col-12 col-lg-9">
                                <h2 class="breadcrumbs-custom-title">Contact</h2>
                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="{{URL::asset('/')}}">Home</a></li>
                                    <li class="active">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-lg text-center bg-default">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-phone-incoming"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="tel:020 753 0784">020 753 0784</a></h4>
                                    <p>U kunt ons altijd bellen</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-map2"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="https://goo.gl/maps/kYf5WPYmfop1a8Cs8">Jan van Galenstraat 131, 1056 BM Amsterdam</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-paper-plane"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="mailto:fietsen020@hotmail.com">fietsen020@hotmail.com</a></h4>
                                    <p>Stuur ons gerust je vragen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact us-->
            <section class="section section-lg bg-gray-1 text-center" id="form-contact">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9 col-lg-7">
                            <h3>Neem contact op</h3>
                            @if (Session::has('message'))
                            <div class="alert alert-success form-success">{{ Session::get('message') }}</div>
                            @endif
                            <!-- RD Mailform-->
                            <form class="rd-form" method="POST" action="{{URL::asset('/contact')}}">
                                @csrf
                                <div class="form-wrap">
                                    <label for="name">Naam:</label>
                                    <input class="form-input" id="contact-name" type="text" name="naam" value="{{Request::old('naam')}}" placeholder="Naam" required>
                                </div>
                                <div class="form-wrap">
                                    <label for="email">E-mail:</label>
                                    <input class="form-input" type="email" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-wrap">
                                    <label for="question">Vraag:</label>
                                    <textarea class="form-input"  name="content" placeholder="Vraag" rows="3" required></textarea>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-7 col-lg-5">
                                        <button class="button button-block button-lg button-primary" type="submit">Verstuur</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--Google Map-->
            <section class="section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.7825245167246!2d4.855664515769823!3d52.374363279786834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5e27193433e27%3A0xb32b87f05502ad89!2s020%20Fietsen%20Amsterdam!5e0!3m2!1snl!2snl!4v1569252624269!5m2!1snl!2snl" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </section>
            <!-- Page Footer-->
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
