<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectSection extends Model
{
    protected $table = 'subject_section' ;

    protected $fillable = ['entity_id',
                            'subject_id',
                            'subject_name'
                        ];

    public function setSectionAttribute($value)
    {
        $this->attributes['section'] = DB::;
    }
}
