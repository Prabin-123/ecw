<?php

use Illuminate\Support\Facades\Route;

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

/* Front End Location */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/category/{id}', 'HomeController@showCates');
Route::get('/contact', function(){
    return view('front.contact');
});
Route::get('/productDetail/{id}', 'HomeController@detailpro');
Route::get('/cart','CartController@index');
Route::get('/cart/addItem/{id}','CartController@addItem');
Route::put('/cart/update/{id}','CartController@update');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::get('/checkout', 'CheckoutController@index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@address');
    Route::put('/updateAddress', 'ProfileController@updateAddress');
    Route::get('/password', 'ProfileController@password');
    Route::put('/updatePassword', 'ProfileController@updatepassword');
    Route::get('/wishlist', 'HomeController@view_wishList');
    Route::post('/addToWishlist', 'HomeController@addWishList')->name('addToWishlist');
    Route::get('/removeWishList/{id}', 'HomeController@removewishlist');
});
/* Front End Location */

/* Admin Location */
Auth::routes();
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){
    Route::get('/', function() {
        return view('admin.index');
    });
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoriesController');
    Route::put('formvalidate', 'CheckoutController@address');
});