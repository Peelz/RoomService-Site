<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classroom ;

use Validator ;

class RoomController extends Controller
{
    protected $view_form  = 'page.room.create-form' ;

    protected $view_list  = 'page.room.list' ;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Route::get('/room/create','RoomController@showForm');
    public function showForm(){
        return view($this->view_form);

    }
    // Route::post('room/create','RoomController@store');
    public function store(Request $req){
        $validator = $this->validator($req->all());
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $room = new Classroom ;
        $room->room_id = $req->input('room_id');
        $room->room_name = $req->input('room_name');
        $room->build = $req->input('build');
        $room->save() ;

        return redirect()->back();
    }


    public function validator(array $data){
        return Validator::make($data,[
            'room_id' => 'required|unique:classroom_entity,room_id',
            'build' => 'required'
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
        $rooms = Classroom::all();
        return view($this->view_list)
            ->with('rooms',$rooms) ;
    }
}
