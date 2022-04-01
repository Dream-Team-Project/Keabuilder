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


Route::get('/heat-request', 'HeatmapController@store');
Route::get('/heatget-request', 'HeatmapController@get');
Route::get('/heatfetchloc-request', 'HeatmapController@fetchloc');
Route::get('/heatfetchmou-request', 'HeatmapController@fetchmou');
Route::get('/heatall-request', 'HeatmapController@fetchall');
Route::get('/heatshome-request', 'HeatmapController@fetchshowme');
Route::get('/saverecordheat', 'HeatmapController@saverecordheat');
Route::get('/showrecordheat', 'HeatmapController@showrecordheat');
Route::get('/getheatdir', 'HeatmapController@getheatdir');
Route::get('/visitorinfo', 'HeatmapController@visitorinfo');
Route::get('/usersbycountry', 'KbanalyticController@usersbycountry');
Route::get('/usersdoctitle', 'KbanalyticController@usersdoctitle');
Route::get('/usersbycity', 'KbanalyticController@usersbycity');
Route::get('/latitudelongtitude', 'KbanalyticController@latitudelongtitude');
Route::get('/userbrowser', 'KbanalyticController@userbrowser');
Route::get('/useros', 'KbanalyticController@useros');
Route::get('/userdevice', 'KbanalyticController@userdevice');



Auth::routes();

Route::get('/home', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});
    
Route::get('/login', function () {
    return view('index');
});

Route::get('/builder', 'HomeController@builder')->name('builder');

Route::post('/getwebpages', 'WebsiteController@getpages');
Route::post('/getautomation', 'WebsiteController@getautomation');
Route::post('/getcampaign', 'WebsiteController@getcampaign');
Route::post('/getwebsite', 'WebsiteController@getwebsite');
Route::post('/getfunneltemplates', 'WebsiteController@getfunneltemplates');


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


