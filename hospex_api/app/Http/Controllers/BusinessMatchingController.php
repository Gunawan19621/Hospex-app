<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MatchRequest;

class BusinessMatchingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $matches = MatchRequest::all();
        $data = [];
        foreach ($matches as $key => $match) {
            $stands = $match->exhibitor->stands;
            $item = '';
            foreach ($stands as $key => $stand) {
                $item .= $stand->stand_name;
                $item = $key === count($stands)-1 ? $item.'.' : $item.', ';
            }
            $data[]  = [
                 'company_name' => $match->exhibitor->company->company_name,
                 'stands'       => $item,
                ];
        }
       
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
       
        
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
        $date = date('Y-m-d', strtotime('27-10-2020'));
        $exhibitor_id       = $request->input('event_exhibitor_id');
        $visitor_id       = $request->input('visitor_id');
        $notes       = $request->input('notes');
        $match = MatchRequest::create([
            'date'                      => $date,
            'location'                  => 'Benhill',
            'event_exhibitor_id'        => $exhibitor_id,
            'visitor_id'                => $visitor_id,
            'notes'                     => $notes,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Data Succesfull Created',
            'data'      => $match
        ],201);
    }
}
