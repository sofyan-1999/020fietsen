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
                    <h2 class="breadcrumbs-custom-title">Openingstijden</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="{{URL::asset('/')}}">Home</a></li>
                        <li class="active">Openingstijden</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-default">
    <div class="container">
        <h2 class="text-center">Openingstijden</h2>
        <br>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td>Maandag</td>
                    <td>10:00 tot 19:00</td>
                </tr>
                <tr>
                    <td>Dinsdag</td>
                    <td>10:00 tot 19:00</td>
                </tr>
                <tr>
                    <td>Woensdag</td>
                    <td>10:00 tot 19:00</td>
                </tr>
                <tr>
                    <td>Donderdag</td>
                    <td>10:00 tot 19:00</td>
                </tr>
                <tr>
                    <td>Vrijdag</td>
                    <td>Gesloten</td>
                </tr>
                <tr>
                    <td>Zaterdag</td>
                    <td>10:00 tot 18:00</td>
                </tr>
                <tr>
                    <td>Zondag</td>
                    <td>10:00 tot 17:00</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
