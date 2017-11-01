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
Auth::routes();

Route::get('/', 'PageController@home')->name('home');

Route::get('/test', function() {
   return \App\Models\Product::all();
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', 'PageController@admin')->name('dashboard');
    Route::get('/account', 'PageController@account')->name('account');

    Route::get('/events', 'PageController@events')->name('events');
    Route::get('/users', 'PageController@users')->name('users');
    Route::get('/products', 'PageController@products')->name('products');

    Route::get('/logout', 'Auth\LoginController@logout');
});