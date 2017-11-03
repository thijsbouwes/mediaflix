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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard/{vue_capture?}', 'PageController@dashboard')->name('dashboard')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/logout', 'Auth\LoginController@logout');
});