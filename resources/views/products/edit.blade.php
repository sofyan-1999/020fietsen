@php
    $categories = DB::table('categories')->get();
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
                    <nav class="rd-navbar rd-navbar-classic navbar-color" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
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
            <section class="section section-lg bg-gray-1 text-center">
                <div class="container container-margin">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9 col-lg-7">
                            <h3>Product wijzigen</h3>
                            <!-- RD Mailform-->
                            <form class="rd-form" method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-wrap">
                                    <label for="title">Titel:</label>
                                    <input class="form-input" type="text" name="titel" value="{{$product->title}}" placeholder="titel">
                                    @if ($errors->has('titel'))
                                        <p class="color-text text-margin">{{ $errors->first('titel') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="condition">Conditie:</label>
                                    <br>
                                    <select name="conditie">
                                        @if ($product->condition == "Gebruikt")
                                            <option value="Gebruikt" selected>Gebruikt</option>
                                        @else
                                            <option value="Gebruikt">Gebruikt</option>
                                        @endif
                                        @if ($product->condition == "Zo goed als nieuw")
                                            <option value="Zo goed als nieuw" selected>Zo goed als nieuw</option>
                                        @else
                                            <option value="Zo goed als nieuw">Zo goed als nieuw</option>
                                        @endif
                                        @if ($product->condition == "Nieuw")
                                            <option value="Nieuw" selected>Nieuw</option>
                                        @else
                                            <option value="Nieuw">Nieuw</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('conditie'))
                                        <p class="color-text text-margin">{{ $errors->first('conditie') }}</p>
                                    @endif
                                </div>
                                <div class="form-wrap">
                                    <label for="description">Beschrijving:</label>
                                    <textarea class="form-input" placeholder="Beschrijving" rows="3" name="beschrijving">{{$product->description}}</textarea>
                                    @if ($errors->has('beschrijving'))
                                        <p class="color-text text-margin">{{ $errors->first('beschrijving') }}</p>
                                    @endif
                                </div>
                                <div class="form-wrap">
                                    <label for="price">Prijs:</label>
                                    <input class="form-input" type="text" name="prijs" value="{{$product->price}}" placeholder="50,00">
                                    @if ($errors->has('prijs'))
                                        <p class="color-text text-margin">{{ $errors->first('prijs') }}</p>
                                    @endif
                                </div>
                                <div class="form-wrap">
                                    <label for="condition">Categorie:</label>
                                    <br>
                                    <select name="category">
                                        @foreach($categories as $category)
                                            @if ($category->id == $product->category_id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <p class="color-text text-margin">{{ $errors->first('category') }}</p>
                                    @endif
                                </div>
                                <div class="form-wrap form-checkbox">
                                    @if($product->home == "1")
                                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina" checked>
                                    @else
                                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina">
                                    @endif
                                    <label class="form-check-label" for="exampleCheck1">Op home pagina</label>
                                </div>
                                <div class="form-wrap ">
                                    <label for="image">Afbeeling:</label>
                                    <input type="file" class="form-control-file" name="afbeelding">
                                    <br>
                                    <img src="{{asset('storage/'.$product->image)}}" alt="Product image" width="200" length="200">
                                    @if ($errors->has('afbeelding'))
                                        <p class="color-text text-margin">{{ $errors->first('afbeelding') }}</p>
                                    @endif
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
                        <p class="rights"><span>&copy;&nbsp;</span><span>020 Fietsen</span><span>&nbsp;</span><span class="copyright-year"></p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="{{URL::asset('/js/core.min.js')}}"></script>
        <script src="{{URL::asset('/js/script.js')}}"></script>
    </body>
</html>
