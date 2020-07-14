<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/contact', function () {
    return view('contact.index');
});

Route::get('/about', function () {
    return view('about.index');
});

Route::get('/openinghours', function () {
    return view('openinghours.index');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/create', 'CategoryController@create')->middleware('auth');

Route::post('/category', 'CategoryController@store')->middleware('auth');

Route::delete('/categories/{id}', 'CategoryController@destroy')->middleware('auth');

Route::post('/category/{id}', 'CategoryController@update')->middleware('auth');

Route::resource('categories', 'CategoryController');

//products

Route::resource('products', 'ProductController');


Route::get('/product/{id}', 'ProductController@product');

Route::post('/contact', function(Request $request){
    Mail::send(new ContactMail($request));
    Session::flash('message', "Bedankt! je vraag is verzonden");
    return redirect('/contact#form-contact');
});
