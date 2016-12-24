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


    public function BookingValidator(array $data){
        $messages = [
            'date.required' => 'กรุณาระบุวันที่ ',
            'end_time.after' => 'เวลาสิ้นสุดการจองไม่ถูกต้อง ',
            'room.exists' => 'ไม่พบห้องในระบบ',
            'room.required' => 'กรุณาระบุห้องที่ต้องการจอง'

        ];
        return Validator::make($data,[
            'subject' => 'exists:subject_entity,subject_id',
            'start_time' => 'required|' ,
            'end_time' => 'required|after:start_time' ,
            'date' => 'required|',
            'room'=> 'required|exists:classroom_entity,room_id',
            'quantity_nisit' => 'required',
            'note' => 'required_without:subject'
        ],$messages);
    }

    public function checkRoomEmptyValidator($data){
        $messages = [
            'date.required' => 'กรุณาระบุวันที่ ',
            'end_time.after' => 'เวลาสิ้นสุดการจองไม่ถูกต้อง ',
            'room.exists' => 'ไม่พบห้องในระบบ',
            'room.required' => 'กรุณาระบุห้องที่ต้องการจอง'

        ];

        $rule = [
            'start_time' => 'required' ,
            'end_time' => 'required|after:start_time' ,
            'room'=> 'required|exists:classroom_entity,room_id',
            'date' => 'required',
        ];
        return Validator::make($data, $rule, $messages);
    }

    public function editFormValidator($data){
        return Validator::make($data,[
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
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

        $start_time = intval($req->start_time) ;
        $end_time = intval($req->end_time);
        $room_booking = Booking::where([
            ['room_id',$req->room],
            ['date',$req->date]
        ])->get();

        //check time overlap
        foreach ($room_booking as $booking) {
            if($start_time > intval($booking->start_time) && $start_time < intval($booking->end_time)
                || $end_time > intval($booking->start_time) && $end_time < intval($booking->end_time)
                || $start_time < intval($booking->start_time) && $end_time > intval($booking->end_time)){
                return FALSE ;
            }
        }

        return TRUE ;
    }

}
