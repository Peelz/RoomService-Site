<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $table = 'classroom_booking' ;

    protected $fillable = [
        'entity_id',
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

    protected $primaryKey = 'entity_id';

    public function subject(){
        return $this->hasOne('\App\Models\Subject','entity_id','subject_id');
    }

    public function section(){
        return $this->hasOne('\App\Models\SubjectSection','section_id','section_id');
    }

    public function room(){
        return $this->hasOne('\App\Models\Classroom','room_id','room_id');
    }

    public function user(){
        return $this->hasOne('\App\Models\User','entity_id','user_id');
    }

    // public function getSubjectAttribute(){
    //     return !is_null( $this->subject()) ? $this->subject() : NULL ;
    // }

    public function getTimeAttribute(){

        return date('H:i',strtotime($this->start_time)).' - '.date('H:i',strtotime($this->end_time));
    }

    public function getSubjectNameAttribute(){
        return ucfirst($this->subject()->subject_name) ;
    }

    public function getRoomNameAttribute(){
        return $this->room->room_id ;
    }

}
