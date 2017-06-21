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

        // Product Stock
        Route::get('/{product}/stocks', 'StockResource@index');
        Route::post('/{product}/stocks', 'StockResource@store');
        Route::get('/stocks/{stock}', 'StockResource@show');
        Route::delete('/stocks/{stock}', 'StockResource@destroy');
        Route::patch('/stocks/{stock}', 'StockResource@update');
    });


    // Event
    Route::group(['prefix' => 'events'], function() {
        Route::get('/', 'EventResource@index');
        Route::get('/{event}', 'EventResource@show');
        Route::delete('/{event}', 'EventResource@destroy');
        Route::patch('/{event}', 'EventResource@update');
        Route::post('/', 'EventResource@store');

        // Event Expense
        Route::get('/{event}/expenses', 'ExpenseResource@index');
        Route::post('/{event}/expenses', 'ExpenseResource@store');
        Route::get('/expenses/{expense}', 'ExpenseResource@show');
        Route::delete('/expenses/{expense}', 'ExpenseResource@destroy');
        Route::patch('/expenses/{expense}', 'ExpenseResource@update');
    });
});
