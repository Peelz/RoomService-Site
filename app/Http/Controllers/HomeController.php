<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{

    use AuthenticatesUsers ;

    protected $redirectTo = '/' ;
    public function __construct()
    {

    }

    public function postLogin(Request $req)
    {
        $this->login($req) ;
    }

    public function username(){
        return 'id' ;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    protected $title ;

    protected $num = [1,2,3,4,5];

    public function prepareData(){
        $this->title='index' ;
    }

    public function getData(){
        return $this->title ;
    }
    public function index()
    {
        return view('page.home')->with('title', $this->num ) ;
    }


}
