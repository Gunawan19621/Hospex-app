<?php

namespace App\Http\Controllers;

use App\EventSchedule;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $eventschedules = EventSchedule::all();
        return view('event_schedule.index',compact('eventschedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {
        $events = Event::findorfail($event_id);
        return view('event_schedule.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['date'=>'required|date|after_or_equal:now', 'event_id' => 'required|numeric']);
        // EventSchedule::create($request->all());
        
        $event = Event::find($request->event_id);
        // $date = new Carbon($request->date);
        $schedule = new EventSchedule([
            'date'  => Carbon::parse($request->date)->format('Y-m-d'),
        ]);

        $create = $event->schedules()->save($schedule);
        $response = $create ?  '1-Event Schedule Saved' : '0-Event Schedule Failed to Save';
        return redirect('/events/'.$event->id)->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventSchedule  $eventSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(EventSchedule $eventSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventSchedule  $eventSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(EventSchedule $eventSchedule)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventSchedule  $eventSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventSchedule $eventschedule)
    {
        $request->validate([
            'date'              => 'required',
        ]);
        try{
            
            EventSchedule::whereId($eventschedule->id)
            ->update([
                'date'       => Carbon::parse($request->date)->format('Y-m-d'),
            ]);
            $response = '1-Schedule Updated';
        } catch (\Exception $e){
            $response = '0-Schedule Failed to Update';
        }
         
        
        return redirect()->back()->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventSchedule  $eventSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventSchedule $eventSchedule)
    {
        //
    }
}
