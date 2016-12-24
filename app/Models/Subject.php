<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject_entity' ;

    protected $fillable = ['entity_id',
                            'subject_id',
                            'subject_name'
                        ];

    protected $primaryKey = 'entity_id' ;


    public function section(){
        return $this->hasMany('\App\Models\SubjectSection','subject_id','entity_id');
    }

    public function instructor(){
        return $this->hasMany('App\Models\Instructor','instructor_id','entity_id');
    }


}
