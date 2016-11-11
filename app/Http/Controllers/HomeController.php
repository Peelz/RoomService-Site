<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\RoomBooking as Booking;
use Auth ;

class HomeController extends Controller
{

    use AuthenticatesUsers ;

    protected $redirectTo = '/' ;


    public function postLogin(Request $req)
    {
        $this->login($req);
    }

    public function getLogout(){
        return Auth::logout();
    }

    public function username(){
        return 'user_id' ;
    }


    public function getRoomBookingData(){
        return Booking::all() ;
    }

    protected $title ;

    protected $data ;

    protected $num = [1,2,3,4,5];

    public function prepareData(){
        $this->title = 'index' ;
        $this->data['roomBooking'] = \App\Models\RoomBooking::all()->random(10) ;
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
