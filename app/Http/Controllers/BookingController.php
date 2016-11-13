<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $data ;

    protected $Viewfrom = 'page.booking.form' ;

    protected $ViewList = 'page.booking.list' ;


    // Route::get('/booking/create','BookingController@showForm');

    public function showForm(){
        return view($this->Viewfrom);
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

        return $data ;

    }
    // Route::post('/booking/create','BookingController@store');

    public function store(Request $req){
        $validator = validator($req->all());

        if ($validator->fails()) {
            return redirect('/booking/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $data = $this->prepareBookingData($req);

            $booking = new \App\Models\Booking ;
            $booking->fill($data) ;
            $booking->save() ;
            return back() ;
        }

    }

    // Route::get('/booking/list','BookingController@getList');

    public function getList()
    {
        $this->data['booking'] = \App\Models\RoomBooking::all() ;

        return view('page.booking.list')
        ->with('data',$this->data ) ;

        dd($data['booking']);
    }

    // Route::get('/booking/edit/{booking_id}','BookingController@getShowAndEditBooking');
    public function getEdit($booking_id)
    {
        $booking = \App\Models\Booking::find($booking_id);

        return view($this->form)
                ->with('booking',$booking);
    }
    // Route::post('/booking/edit','BookingController@showAndEdit');

    public function postEdit(Request $req)
    {
        $validator = validator($req->all());

    }
    // Route::post('/booking/delete','BookingController@destroy');
    public function destroy(Request $req)
    {

    }

}
