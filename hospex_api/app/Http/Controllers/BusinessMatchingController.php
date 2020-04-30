<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MatchRequest;
use Illuminate\Support\Arr;

class BusinessMatchingController extends Controller
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
        $matches = MatchRequest::all();
        $data = [];
        foreach ($matches as $key => $match) {
            $stands = $match->exhibitor->stands;
            $item = '';
            $dist = 0;
            foreach ($stands as $key => $stand) {
                // $item .= $stand->stand_name;
                // $item = $key === count($stands)-1 ? $item.'' : $item.', ';
                if ($dist != $stand->area_id) {
                    $item .= '('.$stand->stand_name;
                }else{
                    $item .= ')';
                }
                $dist = $stand->area_id;
            }
            $data[]  = [
                 'company_name' => $match->exhibitor->company->company_name,
                //  'stands'       => $match->exhibitor->stands()->get()->map(function($item) {
                //                     return $item->area->area_name.' ( '.$item->stand_name.' )';
                //                 })->implode(', '),
                'stands'        => $item
                ];
                $d[]= $match->exhibitor->stands()->get()->map(function($item) {
                    return [$item->area->area_name => $item->stand_name];
                });
        }
       
        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Created',
            'data'      => $data
        ],201);
       
        
    }
    public function show($id)
    {
        // $exhibitor = exhibitor::findorfail($id);
        // $data = [
        //     'company_name'      => $exhibitor->company->company_name,
        //     'company_address'      => $exhibitor->company->company_address,
        //     'company_web'      => $exhibitor->company->company_web,
        //     'company_email'      => $exhibitor->company->company_email,
        //     'event_title'       => $exhibitor->event->event_title
        // ];
        // return response()->json([
        //     'success'   => true,
        //     'message'   => 'Data Found',
        //     'data'      => $data
        // ],200);
    }
    public function store(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->input('date')));
        $exhibitor_id       = $request->input('exhibitor_id');
        $visitor_id         = $request->input('visitor_id');
        $location           = $request->input('location');
        $notes              = $request->input('notes');
        $match = MatchRequest::create([
            'date'                      => $date,
            'location'                  => $location,
            'event_exhibitor_id'        => $exhibitor_id,
            'visitor_id'                => $visitor_id,
            'notes'                     => $notes,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Data Succesfull Created',
            'data'      => collect($match)->except('created_at', 'updated_at')
        ],201);
    }
}
