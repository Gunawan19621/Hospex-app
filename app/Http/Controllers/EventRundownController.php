<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventSchedule;
use App\EventRundown;
use App\Performer;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
class EventRundownController extends Controller
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
        
        $validator = Validator::make($request->all(), [
            'task'              => ['required'], 
            'time'              => ['required'], 
            'taskduration'      => ['required','alpha_num'], 
            'location'          => ['required'], 
            'event_schedule_id' => ['required','alpha_num'],
            'name.*'            => ['required'],
            'email.*'           => ['required'],
            'phone.*'           => ['required'],
            'info.*'            => ['required'],
        ]);
        if ($validator->fails()) {
            // Handle failed logic
            // $response = '0-Rundown Failed to Save';
            
            // return response()->json([
            //     'status'    => '0-Rundown Failed to Save',
            //     'message'      => $validator->getMessageBag()->toArray()]);
             return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }else{
        
            $schedule = EventSchedule::find($request->event_schedule_id);
            $rundown = new EventRundown([
                'task'      => $request->task,
                'time'      => $request->time,
                'duration'  => $request->taskduration,
                'location'  => $request->location
            ]);
            try {
                DB::beginTransaction();
                $schedule->rundowns()->save($rundown);
                $performers = [];
                foreach ($request->name as $key => $name) {
                    $performers[]= [
                        'name'      => $name,
                        'email'     => $request->email[$key],
                        'info'      => $request->info[$key],
                        'phone'     => $request->phone[$key],
                    ];
                }
                $rundown->performers()->createMany($performers);
            
                DB::commit();
                // return response()->json([
                //     'status'    => '1-Rundown Saved',
                //     'message'   =>'']);
                return redirect('/events/'.$schedule->event_id)->with('status', '1-Rundown Saved');
            
            } catch (Throwable $e) {
                DB::rollback();

                return redirect('/events/'.$schedule->event_id)->with('status', '0-Rundown Failed to Save');
            }
        }
        
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

    public function editEvent($event_rundown_id, $event_schedule_id)
    {
        $eventSchedule = EventSchedule::findorfail($event_schedule_id);
        $eventRundown = EventRundown::findorfail($event_rundown_id);

        return view('event_rundown.edit', compact('eventSchedule','eventRundown'));
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

    public function updateEvent($event_rundown_id, $event_schedule_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task'              => ['required'], 
            'time'              => ['required'], 
            'taskduration'      => ['required','alpha_num'], 
            'location'          => ['required'], 
            'event_schedule_id' => ['required','alpha_num'],
            'name.*'            => ['required'],
            'email.*'           => ['required'],
            'phone.*'           => ['required'],
            'info.*'            => ['required'],
        ]);
        if ($validator->fails()) {
            // Handle failed logic
            // $response = '0-Rundown Failed to Save';
            
            // return response()->json([
            //     'status'    => '0-Rundown Failed to Save',
            //     'message'      => $validator->getMessageBag()->toArray()]);
             return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }else{

            try {
                DB::beginTransaction();

                $schedule = EventSchedule::find($event_schedule_id);
                $rundown = EventRundown::find($event_rundown_id);
                $rundown->task      = $request->task;
                $rundown->time      = $request->time;
                $rundown->duration  = $request->taskduration;
                $rundown->location  = $request->location;
                $rundown->save();

                foreach($rundown->performers as $performerEach){
                    $performerEach->delete();
                }

                $performers = [];
                foreach ($request->name as $key => $name) {
                    $performers[]= [
                        'name'      => $name,
                        'email'     => $request->email[$key],
                        'info'      => $request->info[$key],
                        'phone'     => $request->phone[$key],
                    ];
                }
                $rundown->performers()->createMany($performers);
            
                DB::commit();
                // return response()->json([
                //     'status'    => '1-Rundown Saved',
                //     'message'   =>'']);
                return redirect('/events/'.$schedule->event_id)->with('status', '1-Rundown Saved');
            
            } catch (Throwable $e) {
                DB::rollback();

                return redirect('/events/'.$schedule->event_id)->with('status', '0-Rundown Failed to Save');
            }
        }
        
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

    public function destroyEvent($event_rundown_id, $event_schedule_id)
    {
        try{
            $schedule = EventSchedule::find($event_schedule_id);
            $rundown = EventRundown::find($event_rundown_id);

            $rundown->delete();

            $response = '1-Rundown Delete';
            return response()->json($response, 200);
        } catch (\Exception $e){
            $response = '0-Rundown Failed to Delete';
            return response()->json($response, 500);
        }
    }
}
