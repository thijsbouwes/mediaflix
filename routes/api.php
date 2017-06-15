<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function () {
//    return
//});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function() {
    // Status
    Route::get('/', 'StatusController');

    // Product
    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'ProductResource@index');
        Route::get('/{product}', 'ProductResource@show')->where(['product' => '[1-9|0-9]*']);
        Route::delete('/{product}', 'ProductResource@destroy')->where(['product' => '[1-9|0-9]*']);
        Route::patch('/{product}', 'ProductResource@update')->where(['product' => '[1-9|0-9]*']);
        Route::post('/', 'ProductResource@store');
    });
});
