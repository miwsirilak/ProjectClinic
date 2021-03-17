<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workingday;
use Redirect,Response;

class FullCalenderWorkingdayController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Workingday::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('fullcalendarworkingday');
    }
    
   
    public function create(Request $request)
    {  
        $date = date_create_from_format('Y-m-d H:i:s', $request->start);
        $date2 = date_create_from_format('Y-m-d H:i:s', $request->end);
        //echo [$request->start];
       //echo $request->end;
       //$insertArr;
        for( $i = $date; $date< $date2;$date->modify('+1 day')){
            $insertArr = [ 'title' => $request->title,
                       'start' => $date,
                       'end' => $date
                    ];
            $event = Workingday::insert($insertArr);   
        }
        //error_log(string($date));
      /* $insertArr = [ 'title' => $request->title,
                       'start' => $date,
                       'end' => $date2
                    ];
        $event = Workingday::insert($insertArr);   */
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Workingday::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Workingday::where('id',$request->id)->delete();
   
        return Response::json($event);
    }
}