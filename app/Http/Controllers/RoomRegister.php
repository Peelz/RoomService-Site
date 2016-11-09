<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PageController;



class RoomService extends PageController
{
    public function index()
    {
        $data  = array(
            'title' => 'หน้าแรก'

        )
        return view('page.home')->with('data',$data) ;
    }
}
