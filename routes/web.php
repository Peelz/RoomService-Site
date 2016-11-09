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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/','HomeController@index') ;

Route::get('/booking','RoomService@getBooking');

Route::get('/edit','RoomService@getEdit');

Route::get('/repeal','RoomService@getRepeal');


Route::get('test',function(){

    $user = \App\Models\User::find('admin');
    dd(Auth::guard()->attempt(['email'=>'admin@admin.com','password'=>bcrypt('p4ssw0rd')])) ;
});
Route::post('/login', 'HomeController@postLogin');
