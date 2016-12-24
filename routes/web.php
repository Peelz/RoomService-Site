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

Route::get('/password','ForgotPasswordController@getResetPassword');

Route::get('/test',function(){
    $n =  array(
        'items' => [
            [
                'id' => 123,
                'name' => 'kuy'
            ],
            [
                'id' => 1234,
                'name'=> 'tester' ,
            ]
        ]
    );

    return response()->json($n) ;

});

Route::get('/logout', 'HomeController@getLogout');

Route::get('/login',function(){
    return redirect('/');
});
Route::post('/login', 'HomeController@postLogin');


/* Authenticated */
Route::group(['middleware' => ['web','auth']] ,function(){

    /* User permission */
    Route::get('/booking/create',[
        'uses' => 'BookingController@showForm',
        'as' => 'booking.create'
    ]);
    Route::post('/booking/create','BookingController@store');

    Route::get('/booking/list',[
        'uses'=> 'BookingController@getList',
        'as' => 'booking.list'
    ]);
    Route::get('/booking/edit/{id}',[
        'uses' => 'BookingController@getEdit',
        'as' => 'booking.edit'
    ]);
    Route::get('/booking/check',[
        'uses'=> 'BookingController@ajaxCheck'
    ]);
    Route::post('/booking/edit','BookingController@postEdit');
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

    /* Excel Export */
    Route::get('/export','ExportController@getIndex');
    Route::get('/export/download','ExportController@getExport');

    Route::post('/export/download','ExportController@download');


});

Route::group(['prefix' => 'api' ],function(){
    Route::post('calendar/checking','ApiController@CalendarChecking' );
    Route::get('calendar/checking','ApiController@CalendarChecking' );

    Route::get('search/subject','Api\SearchController@searchSubject');

    Route::get('search/section','Api\SearchController@searchSection');

    Route::get('search/instructor','Api\SearchController@searchInstructor');

    Route::get('search/room','Api\SearchController@searchRoom') ;

    Route::get('search/build','Api\SearchController@searchRoom') ;


    // Rotue::get('search/section','Api/');
});
