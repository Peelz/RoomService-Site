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

    protected $data ;

    protected $num = [1,2,3,4,5];

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


    public function prepareData(){
        $this->title = 'หน้าแรก' ;
        $this->data['roomBooking'] = \App\Models\RoomBooking::where("date",'=',\Carbon\Carbon::now('Asia/Bangkok')->format('Y-m-d'))->get() ;
    }

    public function getData(){
        return $this->title ;
    }
    public function index()
    {
        $this->prepareData() ;
        return view('page.home')
        ->with('title', $this->title )
        ->with('data',$this->data ) ;
    }


}
