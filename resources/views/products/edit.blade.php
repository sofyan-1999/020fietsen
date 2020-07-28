@extends('layouts.cart')
@php
$categories = DB::table('categories')->get();
@endphp
@section('content')
<section class="section section-lg bg-gray-1 text-center">
    <div class="container container-margin">
        <div class="row justify-content-md-center">
            <div class="col-md-9 col-lg-7">
                <h3>Product wijzigen</h3>
                <!-- RD Mailform-->
                <form class="rd-form" method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-wrap">
                        <label for="title">Titel:</label>
                        <input class="form-input" type="text" name="titel" value="{{$product->title}}" placeholder="titel">
                        @if ($errors->has('titel'))
                        <p class="color-text text-margin">{{ $errors->first('titel') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="condition">Conditie:</label>
                        <br>
                        <select name="conditie">
                            @if ($product->condition == "Gebruikt")
                            <option value="Gebruikt" selected>Gebruikt</option>
                            @else
                            <option value="Gebruikt">Gebruikt</option>
                            @endif
                            @if ($product->condition == "Zo goed als nieuw")
                            <option value="Zo goed als nieuw" selected>Zo goed als nieuw</option>
                            @else
                            <option value="Zo goed als nieuw">Zo goed als nieuw</option>
                            @endif
                            @if ($product->condition == "Nieuw")
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
                        <textarea class="form-input" placeholder="Beschrijving" rows="3" name="beschrijving">{{$product->description}}</textarea>
                        @if ($errors->has('beschrijving'))
                        <p class="color-text text-margin">{{ $errors->first('beschrijving') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="price">Prijs:</label>
                        <input class="form-input" type="text" name="prijs" value="{{$product->price}}" placeholder="50,00">
                        @if ($errors->has('prijs'))
                        <p class="color-text text-margin">{{ $errors->first('prijs') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="price">Voorraad:</label>
                        <p class="inline color-text"> *</p>
                        <input class="form-input" type="number" name="stock" value="{{$product->stock}}" placeholder="0">
                        @if ($errors->has('stock'))
                        <p class="color-text text-margin">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                    <div class="form-wrap">
                        <label for="condition">Categorie:</label>
                        <br>
                        <select name="category">
                            @foreach($categories as $category)
                            @if ($category->id == $product->category_id)
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
                        @if($product->home == "1")
                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina" checked>
                        @else
                        <input type="checkbox" class="form-check-input" value="1" name="opHomePagina">
                        @endif
                        <label class="form-check-label" for="exampleCheck1">Op home pagina</label>
                    </div>
                    <div class="form-wrap ">
                        <label for="image">Afbeeling:</label>
                        <input type="file" class="form-control-file" name="afbeelding[]" multiple>
                        <br>
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
