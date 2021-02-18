<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Collection;
use App\EventSchedule;
use App\Event;
use App\Helpers\GetEvent as eventId;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $data = [];
        if($event){
            $schedules = EventSchedule::where('event_id',$event->id)->orderby('date')->get();

            if(!$schedules->isEmpty()){
                foreach ($schedules as $key => $schedule) {
                    if($schedule->rundowns){
                        $rundowns = $schedule->rundowns[0]->location;
                    }
                    else{
                        $rundowns = '';
                    }
                    
                    $data[] = [
                        'id'            => $schedule->id,
                        'hari'          => Carbon::parse($schedule->date)->format('l'),
                        'tanggal'       => Carbon::createFromDate($schedule->date)->format('d M, Y '),
                        'lokasi'        => $rundowns,
                        'acara'         => $schedule->rundowns()->get()->map(function($item){
                            return [
                                "tema"         => $item->task,
                                "lokasi"       => $item->location,
                                "pengisi"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->name]; }),
                                "jam_mulai"    => Carbon::createFromTimeString($item->time, 'Asia/Jakarta')->format('H:i'),
                                "jam_selesai"  => Carbon::createFromTimeString($item->time, 'Asia/Jakarta')->addMinutes($item->duration)->format('H:i'),
                            ];
                        }),
                    ];
                }
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }

    public function show($id)
    {
        $rundowns = EventSchedule::findorfail($id)->rundowns;
        $data = [];

        if(!$rundowns->isEmpty()){
            foreach ($rundowns as $key => $rundown) {
                $data[] = [
                    'time'          => $rundown->time,
                    'task'          => $rundown->task,
                    'duration'      => $rundown->duration
                ];
            }
        }
        
        return response()->json([
            'success'   => true,
            'message'   => 'Data Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }
}
