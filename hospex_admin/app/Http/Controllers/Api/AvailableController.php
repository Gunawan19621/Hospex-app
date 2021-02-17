<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\AvailableSchedule;
use App\EventExhibitor;
use App\MatchRequest;
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
        $g         = MatchRequest::select('available_schedule_id')->where('event_exhibitor_id',$exhibitor)->get();
        $flattened = $g->map(function($item){
            return $item->available_schedule_id;
        });
        $data = AvailableSchedule::join('events', 'available_schedules.event_id', '=', 'events.id')
                    ->join('event_exhibitors','events.id','=','event_exhibitors.event_id')
                    ->select('available_schedules.*')
                    ->whereNotIn('available_schedules.id', $flattened)
                    ->orderBy('available_schedules.date')
                    ->get();

        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Found',
            'data'      => $data
        ],200);
    }
}