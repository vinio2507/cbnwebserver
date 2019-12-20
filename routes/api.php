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

$rp = "/ws";

Route::middleware('auth:api')->get($rp.'/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->post($rp.'save-data','GlobalController@store');
Route::middleware('auth:api')->get($rp.'get-data/{name}','GlobalController@show');
Route::middleware('auth:api')->get($rp.'connection-test','GlobalController@connectionTest');
