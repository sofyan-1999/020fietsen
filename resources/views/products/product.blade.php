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
        <h2 class="text">{{$product->title}}</h2>
        <div class="row">
            <div class="col-sm-8">
                <img src="{{asset('storage/'.$product->image_resize)}}" alt="Product afbeelding" height="auto" width="500">
                <br><br>
                <a href="{{asset('add/'.$product->id)}}"><button type="button" class="btn btn-primary">Bestel</button></a>
                <h4>Kenmerken</h4>
                <p>Conditie: {{$product->condition}}</p>
                <br>
                <h4>Beschrijving</h4>
                {!! nl2br(e($product->description)) !!}
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body font-body">
                        <div class="bold-text">€{{$product->price}},-</div>
                        <br>
                        Geïnteresseerd? Bel <a href="tel:020 753 0784">020 753 0784</a>
                        <br>
                        ma-do: 10.00u-19.00u
                        <br>
                        za: 10.00u-18.00u
                        <br>
                        zo: 10.00u-17.00u
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
