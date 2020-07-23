<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AvailableSchedule;
use App\EventExhibitor as exhibitor;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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
        $eventId    = eventId::GetEvent();
        $g=DB::table('match_requests')->select('available_schedule_id')->where(['event_exhibitor_id'=>$exhibitor])->get();
        $flattened = $g->map(function($item){
            return $item->available_schedule_id;
        });
        $data = DB::table('available_schedules')
                    ->select('available_schedules.*')
                    ->leftJoin('events', 'available_schedules.event_id', '=', 'events.id')
                    ->leftjoin('event_exhibitors','events.id','=','event_exhibitors.event_id')
                    ->where(['available_schedules.event_id'=> '2', 'event_exhibitors.id' => $exhibitor])
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