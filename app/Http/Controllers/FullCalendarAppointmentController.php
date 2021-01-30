<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userappointment;
use Redirect,Response;

class FullCalendarAppointmentController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Userappointment::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','username','start', 'end']);
         return Response::json($data);
        }
        return view('fullcalendarUser');
    }
    
   
    public function create(Request $request)
    {  
        $insertArr = [ 'username' => $request->username,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Userappointment::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['username' => $request->username,'start' => $request->start, 'end' => $request->end];
        $event  = Userappointment::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Userappointment::where('id',$request->id)->delete();
   
        return Response::json($event);
    }
}
