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

use Illuminate\Support\Facades\Auth;


$rp = "/ws";


Route::get($rp.'/', function () {
    return view('welcome');
});

//Auth::routes(['verify' => true, 'register' => false]);
Auth::routes();

Route::get($rp.'/home', 'HomeController@index')->name('home');


