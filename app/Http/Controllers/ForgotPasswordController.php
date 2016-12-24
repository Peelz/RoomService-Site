<?php
namespace App\Http\Controllers ;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class  ForgotPasswordController extends BaseController
{

    protected $redirectTo = '/';
    public function getResetPassword(){
        return view('auth/passwords/reset') ;
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function broker(){
        return Password::broker('name');
    }
}
