<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom_entity' ;

    protected $fillable = ['room_id','room_name','build'];

    protected $primaryKey = 'room_id';

    public $timestamps = FALSE ;

}
