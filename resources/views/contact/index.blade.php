@extends('layouts.app')
@php
$categories = DB::table('categories')->orderBy('name', 'asc')->get();
@endphp
@section('content')
            <section class="parallax-container overlay-1" data-parallax-img="{{URL::asset('/images/photo.jpg')}}">
                <div class="parallax-content breadcrumbs-custom context-dark">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-9">
                                <h2 class="breadcrumbs-custom-title">Contact</h2>
                                <ul class="breadcrumbs-custom-path">
                                    <li><a href="{{URL::asset('/')}}">Home</a></li>
                                    <li class="active">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-lg text-center bg-default">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-phone-incoming"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="tel:020 753 0784">020 753 0784</a></h4>
                                    <p>U kunt ons altijd bellen</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-map2"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="https://goo.gl/maps/kYf5WPYmfop1a8Cs8">Jan van Galenstraat 131, 1056 BM Amsterdam</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="box-icon-classic">
                                <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-paper-plane"></span></div>
                                <div class="box-icon-caption">
                                    <h4><a href="mailto:fietsen020@hotmail.com">fietsen020@hotmail.com</a></h4>
                                    <p>Stuur ons gerust je vragen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact us-->
            <section class="section section-lg bg-gray-1 text-center" id="form-contact">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9 col-lg-7">
                            <h3>Neem contact op</h3>
                            @if (Session::has('message'))
                            <div class="alert alert-success form-success">{{ Session::get('message') }}</div>
                            @endif
                            <!-- RD Mailform-->
                            <form class="rd-form" method="POST" action="{{URL::asset('/contact')}}">
                                @csrf
                                <div class="form-wrap">
                                    <label for="name">Naam:</label>
                                    <input class="form-input" id="contact-name" type="text" name="naam" value="{{Request::old('naam')}}" placeholder="Naam" required>
                                </div>
                                <div class="form-wrap">
                                    <label for="email">E-mail:</label>
                                    <input class="form-input" type="email" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-wrap">
                                    <label for="question">Vraag:</label>
                                    <textarea class="form-input"  name="content" placeholder="Vraag" rows="3" required></textarea>
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
            <!--Google Map-->
            <section class="section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.7825245167246!2d4.855664515769823!3d52.374363279786834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5e27193433e27%3A0xb32b87f05502ad89!2s020%20Fietsen%20Amsterdam!5e0!3m2!1snl!2snl!4v1569252624269!5m2!1snl!2snl" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </section>
@endsection
