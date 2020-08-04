@extends('layouts.cart')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
<<<<<<< HEAD
        @endif
        @if(session()->has('message_alert'))
        <div class="alert alert-danger">
            {{ session()->get('message_alert') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('storage/'.$product[0]->first_original_image)}}" alt="First slide">
=======
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
                                            <li class="rd-nav-item active">
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
                            <div class="col-12 col-lg-9">
                                <h2 class="breadcrumbs-custom-title">Fietsen</h2>
                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="{{URL::asset('/')}}">Home</a></li>
                                    <li class="active">Fietsen</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-lg bg-default">
                <div class="container">
                    <h2 class="text">{{$product->title}}</h2>
                    <div class="row">
                        <div class="col-sm-8">
                            <img src="{{asset('storage/'.$product->image)}}" alt="Product afbeelding" height="auto" width="500">
                            <h4>Kenmerken</h4>
                            <br>
                            <ul class="list-group list-group-flush w-75">
                                <li class="list-group-item"><p>Conditie: {{$product->condition}}</p></li>
                            </ul>
                            <br>
                            <h4>Beschrijving</h4>
                            <br>
                            {!! nl2br(e($product->description)) !!}
>>>>>>> accountWijzigen
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('storage/'.$product[0]->second_original_image)}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('storage/'.$product[0]->third_original_image)}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br>
                <a href="{{asset('add/'.$product[0]->id)}}"><button type="button" class="btn btn-primary">Bestel</button></a>
            </div>
            <div class="col-sm-6">
                <h3 class="title mb-3">{{$product[0]->title}}</h3>
                <p class="bold-text">€{{$product[0]->price}},-</p>
                <hr>
                <p><strong>Conditie</strong><br>{{$product[0]->condition}}</p>
                @if($product[0]->stock == 0)
                    <p><strong>Voorraad</strong><br><span class="color-text">NIET MEER OP VOORAAD</span></p>
                @else
                    <p><strong>Voorraad</strong><br>{{$product[0]->stock}}</p>
                @endif
                <hr>
                <p><strong>Beschrijving</strong><br>{!! nl2br(e($product[0]->description)) !!} </p>
            </div>
        </div>
    </div>
</section>
@endsection
