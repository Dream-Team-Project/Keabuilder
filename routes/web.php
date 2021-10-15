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
Route::get('/heat-request', 'HeatmapController@store');
Route::get('/heatget-request', 'HeatmapController@get');
Route::get('/heatfetchloc-request', 'HeatmapController@fetchloc');
Route::get('/heatfetchmou-request', 'HeatmapController@fetchmou');

Auth::routes();

Route::get('/builder', 'HomeController@builder')->name('builder');

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

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/{any}', 'HomeController@index')->name('index');


