<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $table = 'classroom_booking' ;

    protected $fillable = [
        'id',
        'sec',
        'quan_nisit',
        'note',
        'date',
        'start_time',
        'end_time',
        'user_id',
        'room_id',
        'subject_id'
        ] ;

    public function subject(){
        return $this->hasOne('\App\Models\Subject','sub_id','subject_id');
    }

    public function room(){
        return $this->hasOne('\App\Models\Classroom','room_id','room_id');
    }

    public function user(){
        return $this->hasOne('\App\Models\User','user_id','user_id');
    }
}
