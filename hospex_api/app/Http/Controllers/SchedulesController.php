<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\EventSchedule as schedule;
use App\Helpers\GetEvent as eventId;
use Illuminate\Support\Carbon;

class SchedulesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
    }
    
    public function index()
    {
        $eventId = eventId::GetEvent();
        $schedules = schedule::where('event_id', $eventId)
                        ->orderby('date')->get();
        
        $data= [];

        foreach ($schedules as $key => $schedule) {
            
                $data[] = [
                    'id'       => $schedule->id,
                    'day'       => Carbon::parse($schedule->date)->format('l'),
                    'date'      => Carbon::createFromDate($schedule->date)->format('d M, Y ')
                ];

        }

        if (!$schedules->isEmpty()) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        } else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],404);
        }
        
    }
    public function show($id)
    {
        $rundowns = schedule::findorfail($id)->rundowns;
        $data=[];
        foreach ($rundowns as $key => $rundown) {
            $data[] = [
                'time'          => $rundown->time,
                'task'          => $rundown->task,
                'duration'      => $rundown->duration,
                
            ];
        }
        if (count($rundowns) > 0) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        } else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],503);
        }
        
    }
}
