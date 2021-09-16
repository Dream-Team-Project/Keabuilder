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

Route::get('/', function () {
    return view('index');
});

Route::get('/{any}', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

// login system
Route::prefix('auth')->group(function(){
    Route::get('init','AppController@init');

    Route::post('login','AppController@login');
    Route::post('register','AppController@register');
    Route::post('logout','AppController@logout');
    Route::post('send-token','AppController@sendToken');
    Route::post('validate-token','AppController@validateToken');
    Route::post('reset-password','AppController@resetPassword');
});
