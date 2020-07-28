@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container container-login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aanmelden') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mailadres">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Wachtwoord') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Wachtwoord">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    </div>
                            <button type="submit" class="btn btn-primary mr-2 max-width-button">{{ __('Aanmelden') }}</button>
                            <center>
                                <br>
                                <a href="{{URL::asset('/password/reset')}}">Wachtwoord vergeten?</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
