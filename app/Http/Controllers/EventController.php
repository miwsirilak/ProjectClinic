<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Workingday;
// use Carbon\Carbon;

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
        $startday = DB::table('workingdays')->pluck('start');  
        // $startday = Workingday::where('start', '2021-03-22 00:00:00');
        // for ($i = 0; $i <$startday.length(); $i++) {
        //     echo $i;
        //     dd($i);

        // }  

        // $startday = '2021-03-22 00:00:00';
        // $list_startday = array($startday);
        // if(in_array($startday, $list_startday))
        // {
        //     dd($startday );
        // echo "Yes, Your startday: $startday exits in array";
        // } else{
        //     dd($startday );
        // }
        
        return view('events.create')->with('start',$startday);
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

        // test query
        // $user = DB::table('users')->where('name', 'John')->first();
        // $event = workingdays::table('users')->where('name', 'John')->first();
        
        // $titles = DB::table('workingdays')->pluck('start');

        // foreach ($titles as $title) {
        //     echo $title;
        // }
        // $startday = Workingday::find();
        // dd($startday);

        // return redirect()->route('events.index')
        //                 ->with('success','ไม่สามารถนัดหมายแพทย์ได้ เนื่องจากวันที่ท่านเลือกเป็นวันหยุด');

        $date = $request->date;
        // $date = "2021-03-1";
        $startday = DB::table('workingdays')->where('start', $date)->get();
        // dd(count($startday));
        // print_r($startday);
        // dd(gettype($startday));
        if(count($startday) == 1) {
            // dd($startday, $date,'ตรงกับหมอหยุด');
            return redirect()->route('events.create')->with('error','ไม่สามารถทำการนัดหมายได้ เนื่องจากวันที่ท่านเลือกตรงกับวันหยุดของคลินิก');

        } else {
            // dd($startday, $date,'ไม่ตรงกับหมอหยุด');

        // $startday = Carbon::now();
        //     echo $startday->toDateString();



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

        $date = $request->date;
        // $date = "2021-03-1";
        $startday = DB::table('workingdays')->where('start', $date)->get();
        // dd(count($startday));
        // print_r($startday);
        // dd(gettype($startday));
        if(count($startday) == 1) {
            // dd($startday, $date,'ตรงกับหมอหยุด');
            return redirect()->back()->with('error','ไม่สามารถเลื่อนวันนัดหมายได้ เนื่องจากวันที่ท่านเลือกตรงกับวันหยุดของคลินิก');

        } else {


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