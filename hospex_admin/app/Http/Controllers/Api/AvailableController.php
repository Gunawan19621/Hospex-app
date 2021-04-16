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
        $matchRequest = MatchRequest::select('available_schedule_id')->where('event_exhibitor_id',$exhibitor)->get();
        $exclude = [];

        foreach ($matchRequest as $matchRequestEach) {
            $exclude[] = $matchRequestEach->available_schedule_id;
        }

        $data = AvailableSchedule::
                    ->whereNotIn('id', $exclude)
                    ->orderBy('date')
                    ->get();

        if($data->isEmpty()){
            $data = [];
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }
}