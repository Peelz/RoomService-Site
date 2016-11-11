<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject_entity' ;

    protected $fillable = ['sub_id','name'];
}
