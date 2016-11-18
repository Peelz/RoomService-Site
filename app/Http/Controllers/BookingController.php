<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Booking\RoomBooking ;

use App\Classes\Contact\RoomBooking as RoomBookingContact ;

use Auth ;

use App\Models\RoomBooking as Booking ;
use App\Models\Subject ;

class BookingController extends Controller implements RoomBookingContact
{
    use RoomBooking ;

    protected $data ;

    protected $Viewfrom = 'page.booking.form' ;

    protected $ViewList = 'page.booking.list' ;

    protected $redirectTo  = '/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm(){
        return view($this->Viewfrom);
    }

    public function store(Request $req){

        // return $req->all() ;
        $validator = $this->validator($req->all());
        if( $validator->fails()){
            return back()
                    ->withInput()
                    ->withErrors($validator);
        }

        if( $this->CheckRoomIsEmpty($req) ){
            $booking = new Booking ;
            $booking->date = $req->date ;
            $booking->start_time = $req->start_time ;
            $booking->end_time = $req->end_time;
            $booking->quan_nisit = $req->quantity_nisit ;
            $booking->user_id = Auth::user()->entity_id ;
            $booking->subject_id = Subject::where('subject_name',$req->subject)->first()->entity_id ; // none
            $booking->room_id = $req->room;

            $booking->opt_speaker_and_microphone = $req->opt_speaker_and_microphone == 'no' ? true: false;
            $booking->opt_computer = $req->opt_computer == 'no' ? true: false ;
            $booking->opt_projector = $req->opt_projector == 'no' ? true: false ;
            $booking->opt_television = $req->opt_television == 'no' ? true: false ;
            $booking->opt_wired_microphone = $req->opt_wired_microphone == 'no' ? true: false ;
            $booking->opt_visual_presentation = $req->opt_visual_presentation == 'no' ? true: false ;
            $booking->ex_opt_wireless_microphone = $req->ex_opt_wireless_microphone == 'no' ? true: false ;
            $booking->opt_note = $req->opt_not;

            $booking->save();
            return back()->with('message','ทำรายการสำเร็จ') ;
        }

        return back()->with('errors','มีบางอย่างผิดพลาดห') ;
    }

    public function getList()
    {
        $user_id = $this->getUser()->entity_id ;
        $this->data['booking'] = $this->prepareListBookingData($user_id);
        // return $user_id;
        return view('page.booking.list')
        ->with('data',$this->data ) ;
    }

    public function getEdit($booking_id)
    {
        $booking = \App\Models\Booking::find($booking_id);
        if( $booking->user->user_id != $this->getUser()->user_id ){
            return back() ;
        }else{
            return view($this->$Viewfrom)
                    ->with('booking',$booking);
        }
    }

    public function postEdit(Request $req)
    {
        $validator = validator($req->all());

    }
    public function destroy(Request $req)
    {

    }
    public function ajaxCheck(Request $req){
        $response ;
        $validator = $this->CheckRoomEmptyValidator($req->all());

        if( $validator->fails()){
            return response()->json($validator->errors()) ;
        }

        if( $this->CheckRoomIsEmpty($req) ){
            $response = array(
                'reply' => 'Allow'
            );
        }else{
            $response = array(
                'reply' => 'Disallow'
            );
        }

        return response()->json($response) ;

    }

}
