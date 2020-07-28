@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-register">
                <div class="card-header">{{ __('Registreren') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">{{ __('Voornaam') }}</label>
                            <p class="inline color-text"> *</p>
                            <input id="firstname" type="text" class="form-control @error('voornaam') is-invalid @enderror" name="voornaam" value="{{ old('voornaam') }}" required autocomplete="firstname" autofocus placeholder="Voornaam">
                            @error('voornaam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="suffix">{{ __('Tussenvoegsel') }}</label>
                            <input id="suffix" type="text" class="form-control @error('tussenvoegsel') is-invalid @enderror" name="tussenvoegsel" value="{{ old('tussenvoegsel') }}" autocomplete="suffix" autofocus placeholder="Tussenvoegsel">
                            @error('tussenvoegsel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="surname">{{ __('Achternaam') }}</label>
                            <p class="inline color-text"> *</p>
                            <input id="surname" type="text" class="form-control @error('achternaam') is-invalid @enderror" name="achternaam" value="{{ old('achternaam') }}" required autocomplete="surname" autofocus placeholder="Achternaam">
                            @error('achternaam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-mail') }}</label>
                            <p class="inline color-text"> *</p>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mailadres">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Wachtwoord') }}</label>
                            <p class="inline color-text"> *</p>
                            <input id="password" type="password" class="form-control @error('wachtwoord') is-invalid @enderror" name="wachtwoord" required autocomplete="new-password" placeholder="Wachtwoord">
                            @error('wachtwoord')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Bevestig wachtwoord') }}</label>
                            <p class="inline color-text"> *</p>
                            <input id="password-confirm" type="password" class="form-control" name="wachtwoord_confirmation" required autocomplete="new-password" placeholder="Wachtwoord">
                        </div>
                        <p class="color-text">*  is verplicht</p>
                        <br>
                        <button type="submit" class="btn btn-primary mr-2 max-width-button">
                        {{ __('Registreren') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
