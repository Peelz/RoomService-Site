<?php
namespace App\Classes\Foobar ;

use Validator ;


trait RoomBooking
{

    public function getUser(){
        return Auth::user() ;
    }

    public function validator(array $data){
        return Validator::make($data,[
            'start_time' => 'required|' ,
            'end_time' => 'required|' ,
            'date' => 'required|',
            'sub_id' => 'required|' ,
            'user_id' => 'required|' ,
            'room_id'=> 'required|',
            'quan_nisit' => 'required|'
        ]);
    }


    public function prepareBookingData(Request $req ){

        $start_time = $req->start_time ;
        $end_time = $req->end_time;
        $date = $req->date;
        $sub_id = $req->$sub_id ;
        $user_id = $req->instrutor ;
        $room_id = $req->rooom_id ;
        $quan_nisit = $req->quantity_nisit ;

        $userModel = \App\Models\User::where('firstname','=',$req->instrutor)->first() ;

        $data = array(
            'start_time' => $start_time ,
            'end_time' => $end_time,
            'date' => $date,
            'sub_id' => $sub_id ,
            'user_id' => $user_id ,
            'room_id'=> $roomid,
            'quan_nisit' => $quantity_nisit
        );

        public function prepareListBookingData($id){
            return \App\Models\User::findOrFail($id) ;
        }

        return $data ;

    }

}
