<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\EventSchedule;
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
        $schedules = EventSchedule::orderby('date')->get();
        
        $data = [];

        foreach ($schedules as $key => $schedule) {
            $data[] = [
                'id'            => $schedule->id,
                'hari'          => Carbon::parse($schedule->date)->format('l'),
                'tanggal'       => Carbon::createFromDate($schedule->date)->format('d M, Y '),
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

        if (!$schedules->isEmpty()) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        }
        else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],404);
        }
    }

    public function show($id)
    {
        $rundowns = EventSchedule::findorfail($id)->rundowns;
        $data = [];
        foreach ($rundowns as $key => $rundown) {
            $data[] = [
                'time'          => $rundown->time,
                'task'          => $rundown->task,
                'duration'      => $rundown->duration
            ];
        }
        if (count($rundowns) > 0) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        }
        else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],503);
        }
    }
}
