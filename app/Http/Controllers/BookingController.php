<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $data ;
    public function getBooking(){
        return view('page.booking.form');
    }

    public function postBooking(Request $req){

        $start_time = $req->start_time ;
        $end_time = $req->end_time;
        $date = $req->date;
        $sub_id = $req->$sub_id ;
        $user_id = $req->instrutor ;
        $quan_nisit = $req->quantity_nisit ;


        if( $this->storeBooking() ){

        }
        return dd($req->all());
    }

    public function storeBooking($data){
    }


    public function getList()
    {
        $this->data['booking'] = \App\Models\RoomBooking::all() ;

        return view('page.booking.list')
        ->with('data',$this->data ) ;

        dd($data['booking']);
    }

}
