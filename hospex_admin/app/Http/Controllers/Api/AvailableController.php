<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\AvailableSchedule;
use App\EventExhibitor;
use App\MatchRequest;
use App\Event;
use Illuminate\Support\Carbon;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AvailableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('login');
    }

    public function index($exhibitor)
    {
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $data = [];
        if($event){
            $exhibitor = EventExhibitor::where('event_id',$event->id)->where('id',$exhibitor)->first();
            
            if($exhibitor){
                $data = AvailableSchedule::where('event_id', $event->id)->whereDate('date',' >= ',$t)->orderBy('date')->get();

                if($data->isEmpty()){
                    $data = [];
                }
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }
}