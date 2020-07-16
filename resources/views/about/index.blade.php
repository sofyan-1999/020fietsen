@extends('layouts.app')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="parallax-container overlay-1" data-parallax-img="{{URL::asset('/images/photo.jpg')}}">
    <div class="parallax-content breadcrumbs-custom context-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <h2 class="breadcrumbs-custom-title">Over ons</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{URL::asset('/')}}">Home</a></li>
                        <li class="active">Over ons</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-gray-1">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-6 pr-xl-5">
                <img src="images/about.png" alt="About image" width="518" height="434"/>
            </div>
            <div class="col-lg-6">
                <h2>Over ons fietsenwinkel</h2>
                <p>Voorraad van gebruikte fietsen in alle soorten, maten en prijzen. Tweedehands oma- en stadsfietsen vanaf €50! Verschillende A-merken waaronder Gazelle, Sparta, Batavus, Giant en vele anderen. Alle fietsen zijn nagekeken, rijklaar en worden verkocht met bon. Garantie is ook mogelijk.</p>
                <p>Ook voor reparaties kunt u bij ons terecht. Uiteraard ook tegen zeer voordelige prijzen.</p>
                <p>GRAAG TOT ZIENS IN DE WINKEL!!</p>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-white">
    <div class="container">
        <h2 class="text-center">Waarom mensen voor ons kiezen</h2>
        <div class="row row-30 row-md-60">
            <div class="col-md-6 col-lg-4">
                <div class="box-icon-modern">
                    <div class="box-icon-inner decorate-triangle"><i class="material-icons" style="font-size:75px">people_outline</i></div>
                    <div class="box-icon-caption">
                        <h4>Vriendelijk team</h4>
                        <p>Ons team staat altijd klaar om u te helpen</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="box-icon-modern">
                    <div class="box-icon-inner decorate-circle"><i class="material-icons" style="font-size:75px">help_outline</i></div>
                    <div class="box-icon-caption">
                        <h4>De beste service</h4>
                        <p>We helpen onze klanten met de best mogelijke service.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="box-icon-modern">
                    <div class="box-icon-inner decorate-rectangle"><i class="material-icons" style="font-size:75px">directions_bike</i></div>
                    <div class="box-icon-caption">
                        <h4>Betaalbare prijzen</h4>
                        <p>Betaalbare prijzen voor verkoop en reparatie</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
