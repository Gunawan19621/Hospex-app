<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\News;
use App\Helpers\GetEvent as eventId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class NewsController extends Controller
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
        $data = News::orderBy('id','desc')->get();

        if(!$data->isEmpty()){
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
                'data'      => [],
                'status'    => 403
            ],403);
        }
    }

    public function show($news)
    {
        $data = News::where('id',$news)->first();

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
                'status'    => 403
            ],403);
        }
    }
}