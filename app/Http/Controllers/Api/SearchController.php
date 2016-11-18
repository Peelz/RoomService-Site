<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Subject ;
class SearchController extends Controller
{
    public function searchSubject(Request $req){
        $name = $req->name ;

        $modelsToArray = \App\Models\Subject::where('subject_name','like','%'.$name.'%')
        ->get()->toArray();

        $raw_datas = array_pluck($modelsToArray,'subject_name');

        $prepare_response = array() ;

        foreach ($raw_datas as $data) {
            if( !in_array($data, $prepare_response) ){
                $prepare_response = array_prepend($prepare_response,$data);
            }
        }

        $response = array();
        foreach ($prepare_response as $val) {

            $response = array_prepend($response,['subject_name'=>$val]);
        }

        $response = array(
            'results'=> $response
        ) ;

        return response()->json($response) ;
    }

    public function searchSection(Request $req){
        $subject = $req->subject ;

        $response = \App\Models\Section::where('subject_id',$subject)
                    ->where('$req')
                    ->get()
                    ->toArray();

        return response()->json($response) ;
    }

    public function searchRoom(Request $req){
        $room = $req->room ;
        $response  = array() ;
        $raw = \App\Models\Classroom::where('room_id','like',$room.'%')
        ->pluck('subject_name')->get()->toArray();

        $response = array(
            'items'=> $response
        ) ;

        return response()->json($response) ;
    }
}
