<?php
  
namespace App\Http\Controllers;
   
use App\Models\Event;
use Illuminate\Http\Request;
  
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Event::latest()->paginate(50);
    
        return view('appointments.index',compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dataTable()
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('fullcalendarDates');
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'username' => 'required',
        //     'sympotm' => 'required',
        //     'booked' => 'required',
        //     'Workday' => 'required',
        //     'date' => 'required',
        //     'start' => date('Y-m-d H:i:s'),
        //     'end' => date('Y-m-d H:i:s')
        // ]);
        $event = new Event;
        $event->title =  $request->title;
        $event->date = $request->date ;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
        // Event::create($request->all());
        return view('fullcalendarDates')->with('success','เพิ่มข้อมูลเรียบร้อยแล้ว');
        // return redirect()->route('appointments.index')
        //                 ->with('success','Appointment created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('appointments.show',compact('appointment'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {   

        return view('appointments.edit',compact('appointment'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'username' => 'required',
        //     'sympotm' => 'required',
        //     'booked' => 'required',
        //     'Workday' => 'required',
        //     'date' => 'required',
        //     'start' => 'required',
        //     'end' => 'required',
        // ]);
        $event = new Event;
        $event->title =  $request->title;
        $event->date = $request->date ;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
    
        $event->update($request->all());
    
        return redirect()->route('appointments.index')
                        ->with('success','Appointment updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {   
        $event = Event::where('id',$id);
        $event->delete();
    
        return redirect()->route('appointments.index')
                        ->with('success','Appointment deleted successfully');
    }
}