<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Booking

class RoomService extends Controller
{
    public function getBooking()
    {
        return view('page.booking-form');
    }

    public function postRoomBooking(Request $req)
    {
        $validate = $this->RoomBookingValidation($req->all());
        if( $validate ){

            return beforeBooking();
        }else{
            return $validate->error()->all();
        }

    }

    public function RoomBookingValidation(array $data){
        return validate($data,[
            'sec' => 'required|integer|max:3',
            'quan_nisit' => 'required|integer',
            'date' => 'required|date:',
            'begin_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:begin_time',
            'note' => 'nullable'
        ]);
    }


    public function createBooking(array $data)
    {

    }
    public function getEdit(){

    }
}
