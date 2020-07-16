@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<section class="section section-lg bg-gray-1 text-center">
    <div class="container container-margin">
        <div class="row justify-content-md-center">
            <div class="col-md-9 col-lg-7">
                <h3>Categorie wijzigen</h3>
                <!-- RD Mailform-->
                <form class="rd-form" method="POST" action="/category/{{$category->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrap">
                        <label for="contact-name">Naam:</label>
                        <input class="form-input" id="contact-name" type="text" name="naam" value="{{$category->name}}" placeholder="Naam">
                        @if ($errors->has('naam'))
                        <p class="color-text text-margin">{{ $errors->first('naam') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="afbeeling">Afbeeling:</label>
                        <input type="file" class="form-control-file" name="afbeelding">
                        <br>
                        <img src="{{asset('storage/'.$category->image)}}" alt="Category image" width="200" length="200">
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
