@extends('layouts.cart')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        <center>
            <h2>Winkelmand</h2>
        </center>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if(isset($_SESSION['cart']) && $_SESSION['cart']['total'] != 0)
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-hover table-margin-bottom">
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Aantal</th>
                            <th>Prijs</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop door geselecteerde product en laat info zien -->
                        @foreach($_SESSION['cart']['products'] as $cartProduct)
                        <tr>
                            <td><a href="{{URL::asset('/product/' . $cartProduct["id"])}}">{{$cartProduct['title']}}<br><img src="{{asset('storage/'.$cartProduct['image'])}}" alt="product image" width="140" height="57"/></a></td>
                            <td>{{$cartProduct['quantity']}}</td>
                            <td>{{$cartProduct['price']}}</td>
                            <td><a href="{{URL::asset('/remove/' . $cartProduct["id"])}}"><button class="btn btn-light fa">&#xf014;</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4><strong>Totaalprijs</strong></h4>
                        <hr>
                        <table>
                            <tr>
                                <td>Subtotaal</td>
                                <td class="max-width-td">€{{$_SESSION['cart']['total']}},-</td>
                            </tr>
                            <tr>
                                <td>Verzending</td>
                                <td class="max-width-td">TODO</td>
                            </tr>
                            <tr>
                                <td><strong>Totaalprijs</strong></td>
                                <td class="max-width-td"><strong>€{{$_SESSION['cart']['total']}},-</strong></td>
                            </tr>
                        </table>
                        <br>
                        @if(Auth::check())
                        <a href="{{URL::asset('/shoppingCart/address')}}"><button class="btn btn-primary max-width-button">Naar de kassa</button></a>
                        @else
                        <a href="{{URL::asset('/shoppingCart/login')}}"><button class="btn btn-primary max-width-button">Naar de kassa</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h4><strong>Verwachte leveringstermijn</strong></h4>
                        <hr>
                        <p>TODO</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h4><strong>We accepteren</strong></h4>
                        <hr>
                        <p><img src="{{URL::asset('/images/iDEAL.gif')}}" alt="iDEAL logo" width="50" height="57"/></p>
                    </div>
                </div>
            </div>
        </div>
        @else
        <table class="table">
            <td><strong>Je hebt geen artikelen in je winkelwagen.</strong></td>
        </table>
        @endif
    </div>
</section>
@endsection
