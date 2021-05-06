<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Collection;
use App\EventSchedule;
use App\Event;
use App\EventRundown;
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
                        $location = $schedule->rundowns[0]->location;
                    }
                    else{
                        $location = '';
                    }
                    
                    $data[] = [
                        'id'            => $schedule->id,
                        'hari'          => Carbon::parse($schedule->date)->format('l'),
                        'tanggal'       => Carbon::createFromDate($schedule->date)->format('d M, Y '),
                        'lokasi'        => $location,
                        'acara'         => $schedule->rundowns()->get()->map(function($item){
                            return [
                                "id_acara"     => $item->id,
                                "tema"         => $item->task,
                                "lokasi"       => $item->location,
                                "duration"     => $item->duration,
                                "time"         => $item->time,
                                "pengisi"      => $item->performers()->get()->map(function($performer){ return [
                                    'nama' => $performer->name,
                                    'email' => $performer->email,
                                    'phone' => $performer->phone,
                                    'info' => $performer->info
                                ]; }),
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
        $rundowns = EventRundown::findorfail($id);
        $data = '';

        if($rundowns){
            $acara[] = [
                "id_acara"     => $rundowns->id,
                "tema"         => $rundowns->task,
                "lokasi"       => $rundowns->location,
                "duration"     => $rundowns->duration,
                "time"         => $rundowns->time,
                "pengisi"      => $rundowns->performers()->get()->map(function($performer){ return [
                    'nama' => $performer->name,
                    'email' => $performer->email,
                    'phone' => $performer->phone,
                    'info' => $performer->info
                ]; }),
                "jam_mulai"    => Carbon::createFromTimeString($rundowns->time, 'Asia/Jakarta')->format('H:i'),
                "jam_selesai"  => Carbon::createFromTimeString($rundowns->time, 'Asia/Jakarta')->addMinutes($rundowns->duration)->format('H:i')
            ];

            $data = [
                'id'            => $rundowns->schedule->id,
                'hari'          => Carbon::parse($rundowns->schedule->date)->format('l'),
                'tanggal'       => Carbon::createFromDate($rundowns->schedule->date)->format('d M, Y '),
                'lokasi'        => $rundowns->location,
                'acara'         => $acara
            ];
        }
        
        return response()->json([
            'success'   => true,
            'message'   => 'Data Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }
}
