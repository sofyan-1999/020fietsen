@extends('layouts.cart')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="section section-lg bg-default">
    <div class="container">
        <br>
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header">{{ __('Profiel wijzigen') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('updateUser') }}">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">{{ __('Voornaam') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="firstname" type="text" class="form-control @error('voornaam') is-invalid @enderror" name="voornaam" value="{{ Auth::user()->firstname }}" required autocomplete="firstname" autofocus>
                        @error('voornaam')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="suffix">{{ __('Tussenvoegsel') }}</label>
                        <input id="suffix" type="text" class="form-control @error('tussenvoegsel') is-invalid @enderror" name="tussenvoegsel" value="{{ Auth::user()->suffix  }}" autocomplete="suffix" autofocus>
                        @error('tussenvoegsel')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="surname">{{ __('Achternaam') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="surname" type="text" class="form-control @error('achternaam') is-invalid @enderror" name="achternaam" value="{{ Auth::user()->lastname  }}" required autocomplete="surname" autofocus>
                        @error('achternaam')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('E-mail') }}</label>
                        <p class="inline color-text"> *</p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email  }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <p class="color-text">*  is verplicht</p>
                    <br>
                    <button type="submit" class="btn btn-primary mr-2 max-width-button">{{ __('Wijzigen') }}</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
