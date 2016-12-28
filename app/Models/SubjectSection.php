<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectSection extends Model
{
    protected $table = 'subject_sec' ;

    protected $fillable = [
                            'secction_id',
                            'sec',
                            'subject_id',
                            'instructor_id'
                        ];

    protected $primaryKey = 'section_id';

    public function instructor(){
        return $this->hasOne('\App\Models\Instructor','instructor_id','instructor_id');
    }

    public function subject(){
        return $this->hasOne('\App\Models\Subject','entity_id','subject_id');
    }

}
