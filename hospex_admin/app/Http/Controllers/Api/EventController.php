<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Event;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $data = Event::all();
        if (!$data->isEmpty()) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data,
                'status'    => 503
            ],200);
        }
        else {
            return response()->json([
                'success'   => false,
                'message'   => 'Data Not Found',
                'data'      => [],
                'status'    => 503
            ],503);
        }
    }
}