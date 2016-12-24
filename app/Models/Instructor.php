<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor_entity' ;

    protected $fillable = ['instructor_id',
                            'instructor_fname',
                            'instructor_lname'
                        ];

    protected $primaryKey = 'instructor_id' ;


    public function lecture(){
        return $this->hasMany('\App\Models\SubjectSection','subject_id','entity_id');
    }
    public function getFullNameAttribute(){
        return $this->instructor_fname . ' ' . $this->instructor_lname;
    }
}
