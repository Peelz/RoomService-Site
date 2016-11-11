<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/','HomeController@index') ;




Route::get('/booking/repeal','BookingController@getRepeal');
Route::post('/booking/repeal','BookingController@postRepeal');

Route::get('/booking/form','BookingController@getBooking');
Route::post('/booking/form','BookingController@postBooking');

Route::get('/booking/list','BookingController@getList');

Route::get('/booking/edit/{booking_id}','BookingController@getShowAndEditBooking');
Route::post('/booking/edit','BookingController@showAndEdit');

Route::get('/logout', 'HomeController@getLogout');


Route::post('/login', 'HomeController@postLogin');
