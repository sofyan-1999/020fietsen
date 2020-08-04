@extends('layouts.cart')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        <ul class="progressbar">
            <li class="active">Inloggen</li>
            <li class="active">Adres</li>
            <li>Bevestigen</li>
            <li>Klaar!</li>
        </ul>
        <div class="card">
            <div class="card-header">{{ __('Afleveradres') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('shoppingCart.address', Auth::user()->id) }}">
                    @csrf
                    {{ method_field('patch') }}
                    <div class="form-group">
                        <label for="straat">{{ __('Straat') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="straat" type="text" class="form-control @error('straat') is-invalid @enderror" name="straat" value="{{Auth::user()->street}}" required autocomplete="adres" autofocus>
                        @error('straat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="huisnummer">{{ __('Huisnummer') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="huisnummer" type="number" class="form-control @error('huisnummer') is-invalid @enderror" name="huisnummer" value="{{Auth::user()->house_number}}" required autocomplete="house_number" min="1">
                        @error('huisnummer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="toevoeging">{{ __('Toevoeging') }}</label>
                        <input id="toevoeging" type="text" class="form-control @error('toevoeging') is-invalid @enderror" name="toevoeging" value="{{Auth::user()->house_number_suffix}}" autocomplete="toevoeging">
                        @error('toevoeging')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="postcode">{{ __('Postcode') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{Auth::user()->zipcode}}" required autocomplete="current-password">
                        @error('postcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stad">{{ __('Stad') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="stad" type="text" class="form-control @error('stad') is-invalid @enderror" name="stad" value="{{Auth::user()->city}}"  required autocomplete="current-password">
                        @error('stad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <p class="color-text">* is verplicht</p>
                    <br>
                    <button class="btn btn-primary max-width-button">Volgende</buttom>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
