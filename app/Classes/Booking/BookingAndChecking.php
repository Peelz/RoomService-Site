<?php
namespace App\Classes\Booking ;

use Validator ;

use Auth ;
use App\Models\RoomBooking as Booking ;

trait BookingAndChecking
{

    public function getUser(){
        return Auth::user() ;
    }


    public function validator(array $data){
        return Validator::make($data,[
            'subject' => 'exists:subject_entity,subject_name',
            'start_time' => 'required|' ,
            'end_time' => 'required|after:start_time' ,
            'date' => 'required|',
            'room'=> 'required|exists:classroom_entity,room_id',
            'quantity_nisit' => 'required'
        ]);
    }

    public function checkRoomEmptyValidator($data){
        return Validator::make($data,[
            'start_time' => 'required|' ,
            'end_time' => 'required|after:start_time' ,
            'room'=> 'required|exists:classroom_entity,room_id',
            'date' => 'required|',
        ]);
    }


    public function prepareBookingData(Request $req ){

        $start_time = $req->start_time ;
        $end_time = $req->end_time;
        $date = $req->date;
        $sub = $req->$subject ;
        $room = $req->rooom ;
        $quan_nisit = $req->quantity_nisit ;

        $userModel = \App\Models\User::where('firstname','=',$req->instrutor)->first() ;

        $data = array(
            'start_time' => $start_time ,
            'end_time' => $end_time,
            'date' => $date,
            'subject_name' => $sub ,
            // 'instrutor' => $instrutor,
            'room_id'=> $room,
            'quantity_nisit' => $quantity_nisit
        );
    }

    public function prepareListBookingData($id){

        return \App\Models\User::find($id)->booking ;
    }

    public function checkRoomIsEmpty($req){

        $room_booking = Booking::where([
            ['room_id',$req->room],
            ['date',$req->date]
        ])
        ->whereNotBetween('start_time',[$req->start_time,$req->end_time])
        ->whereNotBetween('end_time',[$req->start_time,$req->end_time]) ;

        if($room_booking->get()->count() == 0){
            return true ;
        }
        return false ;
    }

}
