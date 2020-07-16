@extends('layouts.app')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
<!DOCTYPE html>
@section('content')
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
    <div class="container" id="products">
        <h2 class="text-center">Producten
            @if (Auth::check())
            @if(Auth::user()->role_id == 1)
            <a href="{{URL::asset('/products/create')}}">
            <button type="button" class="btn btn-primary">+</button>
            </a>
            @endif
            @endif
        </h2>
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 red-border search" type="text" placeholder="Zoek..." aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="fas fa-search text-grey" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <select class="form-control sort">
                    <option value="">Sorteer op</option>
                    <option value="asc">Prijs: laag naar hoog</option>
                    <option value="desc">Prijs: hoog naar laag</option>
                </select>
            </div>
        </div>
        <div class="row row-20 row-lg-30 list">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 wow-outer">
                <div class="wow">
                    <div class="product-featured">
                        <div class="product-featured-figure">
                            <img src="{{asset('storage/'.$product->image)}}" alt="Product image" class="image" width="370" height="395"/>
                            <div class="product-featured-button"><a class="button button-primary" href="{{URL::asset('/product/' . $product->id)}}">Bekijk</a></div>
                        </div>
                        <div class="product-featured-caption">
                            <h4><a class="product-featured-title title" href="{{URL::asset('/product/' . $product->id)}}">{{$product->title}}</a></h4>
                            <h4><a class="product-featured-title price" href="{{URL::asset('/product/' . $product->id)}}">€{{$product->price}},-</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::check())
            @if(Auth::user()->role_id == 1)
            <div class="top-corner">
                <a href="/products/{{$product->id}}/edit"><button class="btn btn-info btn-small"><i class="material-icons icon-margin">&#xe254;</i></button></a>
                {{ Form::open(array('url' => 'products/' . $product->id, 'class' => 'pull-right delete')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('X', array('class' => 'btn btn-color')) }}
                {{ Form::close() }}
            </div>
            @endif
            @endif
            @endforeach
        </div>
        <ul class="pagination"></ul>
        <center>
            {{ $products->links()}}
        </center>
    </div>
</section>
@endsection
