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

session_start();

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

//shoppincart
Route::get('/shoppingCart', function () {
    return view('shoppingCart.index');
});
Route::get('/shoppingCart/login', function () {
    return view('shoppingCart.login');
});
Route::get('/shoppingCart/address', function () {
    return view('shoppingCart.address');
})->middleware('auth');

Route::get('/shoppingCart/confirm', function () {
    return view('shoppingCart.confirm');
})->middleware('auth');

Route::patch('address/{id}',  ['as' => 'shoppingCart.address', 'uses' => 'ShoppingCartController@address'])->middleware('auth');

Route::get('/add/{id}', 'ShoppingCartController@addToCart');

Route::get('/remove/{id}', 'ShoppingCartController@removeFromCart');



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
