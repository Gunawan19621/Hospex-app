<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MatchRequest;
use Illuminate\Support\Carbon;
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

    public function index($type, $id)
    {
       $matches = $type === 'exhibitor' ? MatchRequest::where(['event_exhibitor_id' => $id])->get() : MatchRequest::where(['visitor_id' => $id])->get();
       $tanggal = $matches->reverse()->unique('date')->reverse();
       


    $data = [];
       foreach ($tanggal as $key => $value) {
           $data[] = [
            'tanggal'           => Carbon::createFromDate($value->date)->format('d M, Y '),
            'hari'              => Carbon::parse($value->date)->format('l'),
            'business_match'    => $matches->map(function( $item ) use( $value ) {
                    if ( $value->date == $item->date) {
                        return [
                                'id'            => $item->id,
                                'logo_PT'       => 'logo1.jpg',
                                'nama_PT'       => $item->exhibitor->company->company_name,
                                'lokasi'        => $item->location,
                                'catatan'       => $item->notes,
                                'visitor_name'  => $item->visitor->visitor_name,
                                'visitor_email' => $item->visitor->visitor_email,
                            ];
                    }else{
                        return false;
                    }
                })->filter()
           ];
        //    $business_match = [];
        //    foreach ($matches as $key => $match) {
        //        if ($value->date === $match->date) {
        //            # code...
        //            $stands = $match->exhibitor->stands;
        //            // $item = '';
        //            // $dist = 0;
        //            // foreach ($stands as $key => $stand) {
        //            //     // $item .= $stand->stand_name;
        //            //     // $item = $key === count($stands)-1 ? $item.'' : $item.', ';
        //            //     if ($dist != $stand->area_id) {
        //            //         $item .= '('.$stand->stand_name;
        //            //     }else{
        //            //         $item .= ')';
        //            //     }
        //            //     $dist = $stand->area_id;
        //            // }
        //            $business_match[]  = [
                           
        //                    'business_match'    => [
        //                        'id'            => $match->id,
        //                        'logo_PT'       => 'logo1.jpg',
        //                        'nama_PT'       => $match->exhibitor->company->company_name,
        //                        'lokasi'        => $match->location,
        //                        'catatan'       => $match->notes,
        //                    ],
        //                    //  'stands'       => $match->exhibitor->stands()->get()->map(function($item) {
        //                    //                     return $item->area->area_name.' ( '.$item->stand_name.' )';
        //                    //                 })->implode(', '),
                           
        //                    // 'stands'        => $item
        //                ];
        //                // $d[]= $match->exhibitor->stands()->get()->map(function($item) {
        //                //     return [$item->area->area_name => $item->stand_name];
        //                // });
        //             }
        //             $data['business_match'] = $business_match;
        //    }
           
        }
                return response()->json([
                    'success'   => true,
                    'message'   => 'Data Successfull Found',
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
        $location           = '';//$request->input('location');
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
