<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Excel ;
use App\Models\RoomBooking as Booking ;
class ExportController extends Controller
{

    protected $indexView = 'page.export.index' ;

    protected $file_name  ;
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
        $this->export($req->all());

        return redirect('/export');
    }

    public function export($data){

        $condition = $data['type'] ;

        if($condition == 'current'){
            $date_picker = $this->getCurrentDate()->format('Y-m') ;

            $query = Booking::where('date','like',$date_picker.'%')->get()->groupBy('room_id');
            $file_name = "lab-service_".$date_picker;
            return $this->exportToExcel($query, $file_name);

        }
        elseif ($condition == 'passed') {
            $month = $data['val1'] ;
            $date_picker = $this->getCurrentDate()->format('Y').'-'.$month ;

            $query = Booking::where('date','like',$date_picker.'%')->get()->groupBy('room_id');
            $file_name = "lab-service_".$date_picker;
            return $this->exportToExcel($query, $file_name);

        }
        elseif ($condition == 'duration') {
            $date_picker = $data['val2'] ;
            $date_range = explode(" - ", $date_picker);
            $query = Booking::whereBetween('date',[$date_range[0],$date_range[1]])->get()->groupBy('room_id');
            $file_name = "lab-service_".$date_picker;
            return $this->exportToExcel($query, $file_name);
        }
        else{
            return redirect('/export');
        }
    }

    public function setFileName($data){
        $this->file_name = $data ;
    }

    public function getFileName(){
        return $this->file_name ;
    }
    function exportToExcel($data, $file_name){

        $remake_data = $data->map(function ($item,$key) {
                            return [$key , $item->count()] ;
                        })->toArray();
        Excel::create($file_name,function($excel) use($remake_data){
            $excel->sheet('Sheetname',function($sheet) use($remake_data){

                $sheet->fromArray($remake_data);
                $sheet->row(1, array(
                     'room', 'used'
                ));
            });
        })->download('xls');
    }

}
