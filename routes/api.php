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
$where = " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function() {
    // Status
    Route::get('/', 'StatusController');

    // Product
    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'ProductResource@index');
        Route::get('/{product}', 'ProductResource@show');
        Route::delete('/{product}', 'ProductResource@destroy');
        Route::patch('/{product}', 'ProductResource@update');
        Route::post('/', 'ProductResource@store');
    });

    // Event
    Route::group(['prefix' => 'events'], function() {
        Route::get('/', 'EventResource@index');
        Route::get('/{event}', 'EventResource@show');
        Route::delete('/{event}', 'EventResource@destroy');
        Route::patch('/{event}', 'EventResource@update');
        Route::post('/', 'EventResource@store');
    });

    // Expense
    Route::group(['prefix' => 'events'], function() {
        Route::get('/{event}/expenses', 'ExpenseResource@index');
        Route::get('/{event}/expenses/{expense}', 'ExpenseResource@show');
        Route::post('/{event}/expenses', 'ExpenseResource@store');
        Route::delete('/expenses/{expense}', 'ExpenseResource@destroy');
        Route::patch('/expenses/{expense}', 'ExpenseResource@update');
    });
});
