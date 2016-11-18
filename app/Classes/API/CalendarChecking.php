<?php
namespace App\Classes\API ;

use Illuminate\Http\Request;

trait CalendarChecking
{
    function CalendarChecking(Request $req)
    {
        $date = $req->date ;
        $bookings = \App\Models\RoomBooking::where('date','=',$date)->get() ;
        $response = array() ;
        foreach ($bookings as $booking) {
            $tmp = array(
                'time' => $booking->start_time.' - '.$booking->end_time,
                'room' => $booking->room->room_id,
                'build' => $booking->room->build,
                'user' => $booking->user->firstname,
                'note' => $booking->note ,
            ) ;
            $response = array_prepend($response,$tmp);
        }

        return response()->json($response);

    }
}
