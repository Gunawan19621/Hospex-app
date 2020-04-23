<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'event_title'       => 'required',
            'year'              => 'required|size:4',
            'city'              => 'required',
            'site_plan'         => 'required',
            'event_location'    => 'required'
        ]);

        // Event::create([
        //     'event_title'       => $request->event_title,
        //     'year'              => $request->year,
        //     'city'              => $request->city,
        //     'site_plan'         => $request->site_plan,
        //     'event_location'    => $request->event_location
        // ]);

        $create = Event::create($request->all());
        $response = $create ? '1-Event Saved' : '0-Event Failed to Save';
        return redirect('/events')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event = Event::findorfail($event->id);
        $schedules = $event->Schedules();
        return view('event_schedule.schedules', compact('schedules','event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
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
        $request->validate([
            'event_title'       => 'required',
            'year'              => 'required|date_format:Y|after_or_equal:now',
            'city'              => 'required',
            'site_plan'         => 'required',
            'event_location'    => 'required'
        ]);
        $update =Event::where('id', $event->id)
                ->update([
                    'event_title'       => $request->event_title,
                    'year'              => $request->year,
                    'city'              => $request->city,
                    'site_plan'         => $request->site_plan,
                    'event_location'    => $request->event_location
                ]);
        
        $response = $update ? '1-Event Updated' : '0-Event Failed to Update';
        return redirect('/events')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $delete = Event::destroy($event->id);
        $response = $delete ? '1-Event Deleted' : '0-Event Failed to Delete';
        return redirect('/events')->with('status',$response);
    }
    public function getevents()
    {
        $events['data'] = Event::all();
        return $events;
    }
}
