<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectSection extends Model
{
    protected $table = 'subject_sec' ;

    protected $fillable = ['sec',
                            'subject_id',
                            'instructor_id'
                        ];

    public function instructor(){
        return $this->hasOne('\App\Models\Instructor','entity_id','instructor_id');
    }

}
