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
                                "pengisi"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->name]; }),
                                "pengisi_email" => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->email]; }),
                                "pengisi_phone" => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->phone]; }),
                                "pengisi_info"  => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->info]; }),
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
        $schedule = EventSchedule::findorfail($id);
        $data = '';

        if($schedule){
            if(!$schedule->rundowns->isEmpty()){
                $location = $schedule->rundowns[0]->location;
            }
            else{
                $location = '';
            }

            $data = [
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
                        "pengisi"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->name]; }),
                        "pengisi_email"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->email]; }),
                        "pengisi_phone"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->phone]; }),
                        "pengisi_info"      => $item->performers()->get()->map(function($performer){ return ['nama' => $performer->info]; }),
                        "jam_mulai"    => Carbon::createFromTimeString($item->time, 'Asia/Jakarta')->format('H:i'),
                        "jam_selesai"  => Carbon::createFromTimeString($item->time, 'Asia/Jakarta')->addMinutes($item->duration)->format('H:i'),
                    ];
                }),
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
