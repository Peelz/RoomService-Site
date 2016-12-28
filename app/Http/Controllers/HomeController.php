<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\RoomBooking as Booking;
use Auth ;

class HomeController extends Controller
{

    use AuthenticatesUsers ;

    protected $title ;

    protected $booking ;

    protected $booking_month ;

    protected $redirectTo = '/' ;


    public function postLogin(Request $req)
    {
        return $this->login($req);
    }

    public function getLogout(Request $req){
        return $this->logout($req);
    }

    public function username(){
        return 'user_id' ;
    }


    public function getRoomBookingData(){
        return Booking::all() ;
    }

    public function getCurrentDate(){
        return \Carbon\Carbon::now('Asia/Bangkok');
    }
    public function prepareData(){
        $this->title = 'หน้าแรก' ;
        $this->booking = \App\Models\RoomBooking::where("date",'=',$this->getCurrentDate()->format('Y-m-d') )->paginate(7) ;

        $this->booking_month = $this->getTotalBooking();

    }

    public function getTotalBooking(){
        $query = \App\Models\RoomBooking::whereMonth("date",'=',$this->getCurrentDate()->format('m'))
                ->get()
                ->groupBy('room_id');

        $data = $query->map(function($item,$key){
            return ['room'=>$key,'visits'=>$item->count()];
        });

        $arr = collect();
        foreach ($data as $key => $value) {
            $arr->prepend($value);
        }

        return $arr->toJson() ;
    }

    public function getData(){
        return $this->title ;
    }
    public function index()
    {
        $this->prepareData() ;
        // return dd($this->data['roomBooking']->toArray());
        // return $this->booking_month ;
        return view('page.home')
        ->with('title', $this->title )
        ->with('data_booking',$this->booking )
        ->with('data_booking_month',$this->booking_month) ;
    }


}
