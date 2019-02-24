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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1' , 'middleware' => 'jwt.auth:api' ], function () {
    Route::get('/personInfo',       'LogPersonController@getAll');
    Route::post('/personInfo/save', 'LogPersonController@log');
    Route::post('/fibonacciSeries', 'FibonacciController@series');
});
Route::group(['prefix' => 'v1' ], function () {
    Route::post('/auth/login', 'AuthController@authenticate');
});
