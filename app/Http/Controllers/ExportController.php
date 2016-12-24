<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Excel ;
class ExportController extends Controller
{

    protected $indexView = 'page.export.index' ;


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        return view($this->indexView)
        ->with('date',$this->getCurrentDate()) ;
    }

    public function getCurrentDate(){
        return  \Carbon\Carbon::now();
    }

    public function download(Request $req){
        return $req->all();
        $this->export($req->all());
    }

    public function export($param){

        $condition = $param->type ;

        $file_name = " " ;

        if($condition == 'current'){
            $current = $this->getCurrentDate() ;
        }
        elseif ($condition == 'passed') {
            $month = $param->val1 ;
        }
        elseif ($condition == 'duration') {
            $start ;
            $end ;
        }
        else{

        }
    }

    public function setFileName($param){
        $this->file_name = $param ;
    }

    function exportToExcel($param){
        $data  =\ App\Models\Subject::all()->take(50);

        Excel::create('test_ex',function($excel){
            $excel->sheet('Sheetname',function($sheet){
                $sheet->fromArray($data);
            });
        })->download('xls');
    }

    public function getExport()
    {
        // $data  = \App\Models\Subject::all()->take(50) ;
        //
        // Excel::create('Filename', function($excel) use($data) {
        //
        //     $excel->sheet('Sheetname', function($sheet) use($data) {
        //         $sheet->row(1, array(
        //              'test1', 'test2'
        //         ));
        //
        //         $sheet->fromArray($data, null, 'A2', false, false);
        //
        //     });
        //
        // })->export('xls');

        return redirect('export ') ;
    }
}
