<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $ViewForm  = 'page.room.form' ;

    protected $viewList = 'page.room.list' ;

    // Route::get('/room/create','RoomController@showForm');
    public function showForm(){
        return view($this->ViewForm); 

    }
    // Route::post('room/create','RoomController@store');
    public function store(Request $req){
        $validator = validator($req->all());
        if ($validator->fails()) {
            return redirect('/room/create')
                        ->withErrors($validator)
                        ->withInput();
        }else {

        }
    }


    public function validator(array $data){
        return Validator::make($data,[

        ]);
    }

    // Route::get('/room/edit/{id}','RoomController@edit');
    public function edit($room_id)
    {
        $room = \App\Models\Classrom::find($id) ;
        return view($this->viewForm)
                ->with('room',$room);
    }
    // Route::get('/room/list','RoomController@getList');
    public function getList(){
        return view($this->viewList) ;
    }
}
