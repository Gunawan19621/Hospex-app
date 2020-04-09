<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventSchedule;
use App\EventRundown;
class EventRundownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EventSchedule $schedule)
    {   
        // $event_schedule = EventSchedule::findorfail($schedule->id);
        return view('event_rundown.create', compact('schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task'              => 'required', 
            'time'              => 'required', 
            'taskduration'      => 'required', 
            'event_schedule_id' => 'required|alpha_num'
            ]);
        
        $event = EventSchedule::find($request->event_schedule_id);
        $schedule = new EventRundown([
            'task'      => $request->task,
            'time'      => $request->time,
            'duration'  => $request->taskduration
        ]);

        $event->rundowns()->save($schedule);

        return redirect('/events/'.$event->id)->with('status', 'Event Schedule Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
