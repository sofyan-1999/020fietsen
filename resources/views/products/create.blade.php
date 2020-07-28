@extends('layouts.cart')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
<section class="section section-lg bg-gray-1 text-center">
    <div class="container container-margin">
        <div class="row justify-content-md-center">
            <div class="col-md-9 col-lg-7">
                <h3>Product toevoegen</h3>
                <!-- RD Mailform-->
                <form class="rd-form" method="POST" action="/products" enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrap">
                        <label for="title">Titel:</label>
                        <p class="inline color-text"> *</p>
                        <input class="form-input" type="text" name="titel" value="{{Request::old('titel')}}" placeholder="titel">
                        @if ($errors->has('titel'))
                        <p class="color-text text-margin">{{ $errors->first('titel') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="condition">Conditie:</label>
                        <p class="inline color-text"> *</p>
                        <br>
                        <select name="conditie">
                            @if (Request::old('conditie') == "Gebruikt")
                            <option value="Gebruikt" selected>Gebruikt</option>
                            @else
                            <option value="Gebruikt">Gebruikt</option>
                            @endif
                            @if (Request::old('conditie') == "Zo goed als nieuw")
                            <option value="Zo goed als nieuw" selected>Zo goed als nieuw</option>
                            @else
                            <option value="Zo goed als nieuw">Zo goed als nieuw</option>
                            @endif
                            @if (Request::old('conditie') == "Nieuw")
                            <option value="Nieuw" selected>Nieuw</option>
                            @else
                            <option value="Nieuw">Nieuw</option>
                            @endif
                        </select>
                        @if ($errors->has('conditie'))
                        <p class="color-text text-margin">{{ $errors->first('conditie') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="description">Beschrijving:</label>
                        <p class="inline color-text"> *</p>
                        <textarea class="form-input" placeholder="Beschrijving" rows="3" name="beschrijving">{{Request::old('beschrijving')}}</textarea>
                        @if ($errors->has('beschrijving'))
                        <p class="color-text text-margin">{{ $errors->first('beschrijving') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="price">Prijs:</label>
                        <p class="inline color-text"> *</p>
                        <input class="form-input" type="text" name="prijs" value="{{Request::old('prijs')}}" placeholder="50,00">
                        @if ($errors->has('prijs'))
                        <p class="color-text text-margin">{{ $errors->first('prijs') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="price">Voorraad:</label>
                        <p class="inline color-text"> *</p>
                        <input class="form-input" type="number" name="stock" value="{{Request::old('stock')}}" placeholder="0">
                        @if ($errors->has('stock'))
                        <p class="color-text text-margin">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="condition">Categorie:</label>
                        <p class="inline color-text"> *</p>
                        <br>
                        <select name="category">
                            @foreach($categories as $category)
                            @if (Request::old('category') == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                        <p class="color-text text-margin">{{ $errors->first('category') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap form-checkbox">
                        @if(Request::old('opHomePagina') == "1")
                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina" checked>
                        @else
                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina">
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Op home pagina</label>
                    </div>
                    <div class="form-wrap">
                        <label for="image">Afbeeling:</label>
                        <p class="inline color-text"> *</p>
                        <input type="file" class="form-control-file" name="afbeelding[]" multiple>
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
