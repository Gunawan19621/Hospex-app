<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Information;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class InformationController extends Controller
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
        $data = Information::first();

        if($data){
            if($data->about == null){
                $data->about = '';
            }

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
                'status'    => 403
            ],403);
        }
    }
}