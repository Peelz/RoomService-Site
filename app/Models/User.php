<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false ;

    protected $primaryKey = 'user_id' ;

    public $incrementing = false ;

    protected $table = 'user_entity'  ;


}
