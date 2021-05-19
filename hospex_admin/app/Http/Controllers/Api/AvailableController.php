<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\AvailableSchedule;
use App\EventExhibitor;
use App\MatchRequest;
use App\Event;
use App\User;
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

    public function index($exhibitor, $user_id)
    {
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $data = [];
        if($event){
            $exhibitor = EventExhibitor::where('event_id',$event->id)->where('id',$exhibitor)->first();
            
            if($exhibitor){
                $user = User::where('id', $id)->first();
                $visitor = EventVisitor::where('event_id',$event->id)->where('company_id', $user->company_id)->first();

                if($visitor){
                    $matchRequest = MatchRequest::select('available_schedule_id')->where('event_exhibitor_id', $exhibitor->id)->where('event_visitor_id', $visitor->id)->whereIn('status',['0','1'])->groupBy('available_schedule_id')->get();
                }
                else{
                    $newVisitor = new EventVisitor();
                    $newVisitor->event_id   = $event->id;
                    $newVisitor->company_id = $user->company_id;
                    $newVisitor->save();

                    $matchRequest = MatchRequest::select('available_schedule_id')->where('event_exhibitor_id', $exhibitor->id)->where('event_visitor_id', $newVisitor->id)->whereIn('status',['0','1'])->groupBy('available_schedule_id')->get();
                }

                if(!$matchRequest->isEmpty()){
                    $matchRequestOut = [];

                    foreach ($matchRequest as $matchRequestEach) {
                        $matchRequestOut[] = $matchRequestEach->available_schedule_id;
                    }

                    $data = AvailableSchedule::where('event_id', $event->id)->whereDate('date',' >= ',$t)->whereNotIn('id',$matchRequestOut)->orderBy('date')->get();
                }
                else{
                    $data = AvailableSchedule::where('event_id', $event->id)->whereDate('date',' >= ',$t)->orderBy('date')->get();
                }

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