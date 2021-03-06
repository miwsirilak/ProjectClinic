<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
    
        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function dataTable()
    // {
    //     if(request()->ajax()) 
    //     {
 
    //      $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
    //      $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
    //      $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','booked','start', 'end']);
    //      dd(json($data));
    //      return Response::json($data);
    //     }
    //     return view('fullcalendarDates');
    // }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
        //     'sympotm' => 'required',
        // ]);
    // dd(Auth::user());
        // Event::create($request->all());
        $event = new Event;
        $event->title =  $request->title;
        $event->userid = Auth::user()->id;
        $event->username = Auth::user()->name;
        $event->sympotm =  $request->sympotm;
        $event->booked = $request->booked;
        $event->date = $request->date ;
        $event->Workday = $request->Workday;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
     
        return redirect()->route('events.index')
                        ->with('success','ท่านได้ทำการนัดหมายแพทย์เรียบร้อยแล้ว');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit',compact('event'));
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
        //     'sympotm' => 'required',
        // ]);
    
        // $event->update($request->all());
        // $event = new Event;
        $event->title =  $request->title;
        $event->sympotm =  $request->sympotm;
        $event->booked = $request->booked;
        $event->date = $request->date;
        $event->Workday = $request->Workday;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
    
        return redirect()->route('events.index')
                        ->with('success','ท่านได้เลื่อนวันนัดหมายแพทย์เรียบร้อยแล้ว');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
    
        return redirect()->route('events.index')
                        ->with('success','ท่านได้ทำการยกเลิกวันนัดเรียบร้อยแล้ว');
    }
}