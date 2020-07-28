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
