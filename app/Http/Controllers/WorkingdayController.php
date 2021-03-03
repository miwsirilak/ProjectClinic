<?php

namespace App\Http\Controllers;

use App\Models\Workingday;
use Illuminate\Http\Request;

class WorkingdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingdays = Workingday::latest()->paginate(5);
    
        return view('workingdays.index',compact('workingdays'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function dataTable()
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
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workingdays.create');
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
        //     'detail' => 'required',
        //     'date' => 'required',
        // ]);
    
        // Workingday::create($request->all());
        $event = new Workingday;
        $event->title =  $request->title;
        $event->detail =  $request->detail;
        $event->date = $request->date ;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
     
        // return redirect()->route('workingdays.index')
        return redirect()->route('fullcalendarworkingday')
                        ->with('success','workingday created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Workingday  $workingday
     * @return \Illuminate\Http\Response
     */
    public function show(Workingday $workingday)
    {
        return view('workingdays.show',compact('workingday'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workingday  $workingday
     * @return \Illuminate\Http\Response
     */
    public function edit(Workingday $workingday)
    {
        return view('workingdays.edit',compact('workingday'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workingday  $workingday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workingday $workingday)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'detail' => 'required',
        //     'date' => 'required',
        // ]);
    
        // $workingday->update($request->all());
        $event = new Workingday;
        $event->title =  $request->title;
        $event->detail =  $request->detail;
        $event->date = $request->date ;
        $event->start = $request->start = $request->date;
        $event->end = $request->end = date('Y-m-d H:i:s');
        $event->save();
    
        // return redirect()->route('workingdays.index')
        return redirect()->route('fullcalendarworkingday')
                        ->with('success','Workingday updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workingday  $workingday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workingday $workingday)
    {
        $workingday->delete();
    
        return redirect()->route('workingdays.index')
                        ->with('success','Workingday deleted successfully');
    }
}