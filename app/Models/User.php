<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    // public $incrementing = false ;

    protected $table = 'user_entity'  ;

    protected $fillable = ['entity_id', 'user_id','email','firstname','lastname','password','status','role'];

    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey = 'entity_id';


     public function booking(){
         return $this->hasMany('App\Models\RoomBooking','user_id','entity_id');
     }
     public function getAuthIdentifier()
     {
         return $this->getKey();
     }

     public function getAuthPassword()
     {
         return $this->password;
     }
     public function getFullNameAttribute(){
         return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
     }






}
