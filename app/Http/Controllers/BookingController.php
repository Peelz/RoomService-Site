<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Booking\BookingAndChecking ;

use App\Classes\Contact\RoomBooking as RoomBookingContact ;

use Auth ;

use App\Models\RoomBooking as Booking ;
use App\Models\Subject ;
use App\Models\SubjectSection ;


class BookingController extends Controller implements RoomBookingContact
{
    use BookingAndChecking ;

    protected $data ;

    protected $view_form = 'page.booking.create' ;

    protected $view_edit = 'page.booking.edit' ;

    protected $view_list = 'page.booking.list' ;

    protected $redirectTo  = '/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm(){
        return view($this->view_form);
    }

    public function store(Request $req){

        // return $req->all() ;
        $validator = $this->BookingValidator($req->all());
        // return $req->all();
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
            $subject_id = Subject::where('subject_id',$req->subject)->first()->entity_id ;
            $booking->section_id = !empty($req->subject) ? SubjectSection::where('subject_id',$subject_id)
                                                                    ->where('sec',$req->sec)
                                                                    ->where('instructor_id',$req->instructor)
                                                                    ->first()->section_id : NULL ; // onne
            $booking->room_id = $req->room;
            $booking->note =  $req->input('note') ;

            $booking->opt_speaker_and_microphone = $req->opt_speaker_and_microphone == 'on' ? TRUE: FALSE;
            $booking->opt_computer = $req->opt_computer == 'on' ? TRUE: FALSE ;
            $booking->opt_projector = $req->opt_projector == 'on' ? TRUE: FALSE ;
            $booking->opt_television = $req->opt_television == 'on' ? TRUE: FALSE ;
            $booking->opt_wired_microphone = $req->opt_wired_microphone == 'on' ? TRUE: FALSE ;
            $booking->opt_visual_presentation = $req->opt_visual_presentation == 'on' ? TRUE: FALSE ;
            $booking->ex_opt_wireless_microphone = $req->ex_opt_wireless_microphone == 'on' ? TRUE: FALSE ;
            $booking->opt_note = $req->opt_note;

            $booking->save();
            return back()->with('message','ทำรายการสำเร็จ') ;
        }

        return back()->with('errors','มีบางอย่างผิดพลาด') ;
    }

    public function getList()
    {
        $user_id = $this->getUser()->entity_id ;
        $this->data['booking'] = $this->prepareListBookingData($user_id);
        // $this->data['booking']->setPath('booking/list');
        return view($this->view_list)
        ->with('data',$this->data ) ;
    }

    public function getEdit($booking_id)
    {
        $booking = Booking::find($booking_id);

    //   Check URL Owner
        if( empty($booking) || $booking->user->user_id != $this->getUser()->user_id ){
            return back() ;
        }else{
            return view($this->view_edit)
            ->with('booking',$booking);
        }
    }
    public function update(Request $req,$booking_id){
        $validator = $this->editFormValidator($req->all());

        if($validator->fails()){
            return back()
                ->withErrors()
                ->withInput($validator);
        }else {
            $booking = Booking::find($booking_id)->update([
                'start_time'=> $req->input('start_time'),
                'end_time' => $req->input('end_time')

            ]);
            return back()->with('message','ทำรายการสำเร็จ') ;

        }



    }

    public function postEdit(Request $req)
    {
        $validator = BookingValidator($req->all());

    }

    // check room was booked .
    public function ajaxCheck(Request $req){
        $response ;
        $validator = $this->CheckRoomEmptyValidator($req->all());

        if( $validator->fails()){
            $response = array(
                'reply' => 'Disallow',
                'errors' => $validator->errors()
            );
            return response()->json($response) ;
        }

        if( $this->CheckRoomIsEmpty($req) ){
            $response = array(
                'reply' => 'Allow'
            );
        }else{
            $validator->errors()->add('time','ไม่ว่าง');
            $response = array(
                'reply' => 'Disallow',
                'errors' => $validator->errors() ,
            );
        }

        return response()->json($response) ;

    }

}
