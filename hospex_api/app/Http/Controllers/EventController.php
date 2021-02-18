<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EventController extends Controller
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

    public function index()
    {
        $t = Carbon::now();
        $data = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        if($data){
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data,
                'status'    => 200
            ],200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Data not Found',
                'data'      => '',
                'status'    => 503
            ],503);
        }
    }
}