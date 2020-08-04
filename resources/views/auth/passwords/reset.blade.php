@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wachtwoord opnieuw instellen') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">{{ __('E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Wachtwoord') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{str_replace("Password","Wachtwoord", $message)}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Bevestig wachtwoord') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary max-width-button">
                                {{ __('Wachtwoord opnieuw instellen') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="section section-lg bg-default">
@endsection
