<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false ;

    public $incrementing = false ;

    protected $table = 'user_entity'  ;

    protected $fillable = ['user_id','email','firstname','lastname'];

    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey = 'user_id';

    public function getAuthIdentifierName(){
        return $this->user_id;
    }
    public function getAuthIdentifier(){
        return $this->user_id;
    }
    public function getAuthPassword(){
        return $this->password;
    }




}
