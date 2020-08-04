@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@extends('layouts.cart')
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        <ul class="progressbar">
            <li class="active">Inloggen</li>
            <li class="active">Adres</li>
            <li class="active">Bevestigen</li>
            <li class="active">Klaar!</li>
        </ul>
        <h2>Betaling gelukt</h2>
        <p>Bedankt voor uw bestelling! Je ontvangt een orderbevestiging per e-mail.</p>
        <br>
        <a href="{{URL::asset('/')}}"><button class="btn btn-primary">Home</button></a>
    </div>
</section>
@endsection
