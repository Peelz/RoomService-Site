<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Subject ;
use App\Models\SubjectSection as Section ;
use App\Models\Instructor ;

class SearchController extends Controller
{
    public function searchSubject(Request $req){
        $query = $req->name ;

        $response = $this->getSubjectInformation($query) ;

        $response = array(
            'results'=> $response
        ) ;

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json($response, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function getSubjectInformation($query){

        $models = \App\Models\Subject::where('subject_name','like','%'.$query.'%')
        ->get();
        $modelsToArray = $models->toArray();

        // $raw_datas = array_pluck($modelsToArray,'subject_name','subject_id');

        //name id sec teacher
        $prepare_response = array() ;

        foreach ($models as $model) {
            $subject_id = $model['entity_id'] ;

            // $subject_sections = Section::where('subject_id',$subject_id)->get();
            //
            // $raw_instructors = $subject_sections->pluck('instructor_id')->all();
            //
            // $instructors = array() ;
            // foreach ($raw_instructors as $raw_instructor ) {
            //     $instructor_fullname = Instructor::find($raw_instructor)->full_name ;
            //
            //     $instructors = array_prepend($instructors, $instructor_fullname);
            //
            // }
            $arr = array(
                'id'=> $model['subject_id'],
                'name' => $model['subject_name'],
                // 'instructor' => $instructors,
                );
            $prepare_response = array_prepend($prepare_response,$arr);
        }
        return $prepare_response;
        // return dd($prepare_response);

        $response = array();
        foreach ($prepare_response as $val) {
            $response = array_prepend($response,$val);
        }
        return $response;
    }

    public function searchInstructor(Request $req){
        $subject_id = Subject::where('subject_id',$req->sub)->first()->entity_id ;

        // return $subject_id ;
        $section = $req->sec ;

        $section_class = Section::where([
            ['subject_id', '=', $subject_id],
            ['sec', '=', $section]
        ])->get();
        $data_response = array() ;
        foreach ($section_class as $sec) {
            $instructor_id = $sec->instructor_id ;

            $instructor = Instructor::find($instructor_id);
            $prepare_data = array(
                'id' => $instructor->instructor_id,
                'name' => $instructor->full_name
            );

            $data_response = array_prepend($data_response,$prepare_data);

        }

        $response = array(
            'success' => true ,
            'results' => $data_response
        );

        return response()->json($response, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function searchSection(Request $req){
        $subjectId = $req->q ;
        $subject = Subject::where('subject_id', $subjectId)->first()->entity_id ;

        $raw_data = Section::where('subject_id',$subject)
                    ->get();

        $response = array();
        foreach ($raw_data as $key=>$data) {
            $secToString = (string)$data['sec'] ;

            $data['sec'] = $secToString ;
            // $prepare = array(
            //     'title' => $secToString,
            // );
            // $response = array_prepend($response, $prepare);

        }
        // return $raw_data;
        $response = array('results' => $raw_data);

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

        return response()->json(array('results'=>$response)) ;
    }
}
