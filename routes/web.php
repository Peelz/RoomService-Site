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


Route::get('/test',function(){
    $faker = Faker\Factory::create();
    $data = array(
        'user_id' => $faker->word,
        'password' => 123123,
        'email' => $faker->email,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
    );

    $user = new App\Models\User ;

    $user->fill($data);
    $user->save();

    dd($user);

});

Route::get('/logout', 'HomeController@getLogout');
Route::post('/login', 'HomeController@postLogin');

/* Api */
Route::post('boom/api','BookingController@apiAjax');

/* Authenticated */
Route::group(['middleware' => 'web'] ,function(){

    /* User permission */
    Route::get('/booking/create','BookingController@showForm');
    Route::post('/booking/create','BookingController@store');
    Route::get('/booking/list','BookingController@getList');
    Route::get('/booking/edit/{booking_id}','BookingController@getEdit');
    Route::post('/booking/edit','BookingController@posttEdit');
    Route::post('/booking/delete','BookingController@destroy');





    //### admin permission ###//
    //
    // See all Booking
    // Edit non-Owner Booking
    //
    // Create new Subject
    // Edit Subject
    // Delete Subject


    /* Room */
    Route::get('/room/create','RoomController@showForm');
    Route::post('room/create','RoomController@store');
    Route::get('/room/edit/{id}','RoomController@edit');
    Route::get('/room/list','RoomController@getList');


});
