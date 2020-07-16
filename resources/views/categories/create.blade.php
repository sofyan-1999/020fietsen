@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<section class="section section-lg bg-gray-1 text-center">
    <div class="container container-margin">
        <div class="row justify-content-md-center">
            <div class="col-md-9 col-lg-7">
                <h3>Categorie toevoegen</h3>
                <!-- RD Mailform-->
                <form class="rd-form" method="POST" action="/category" enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrap">
                        <label for="contact-name">Naam:</label>
                        <p class="inline color-text"> *</p>
                        <input class="form-input" id="contact-name" type="text" name="naam" value="{{Request::old('naam')}}" placeholder="Naam">
                        @if ($errors->has('naam'))
                        <p class="color-text text-margin">{{ $errors->first('naam') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="afbeeling">Afbeeling:</label>
                        <p class="inline color-text"> *</p>
                        <input type="file" class="form-control-file" name="afbeelding">
                        @if ($errors->has('afbeelding'))
                        <p class="color-text text-margin">{{ $errors->first('afbeelding') }}</p>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-7 col-lg-5">
                            <button class="button button-block button-lg button-primary" type="submit">Verstuur</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
