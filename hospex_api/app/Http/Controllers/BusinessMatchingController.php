<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MatchRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use PHPUnit\Framework\MockObject\Builder\Match;

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

    public function index($type, $id, $status)
    {
        $whereid = $type == 'visitor' ? ['visitor_id'=>$id] : [ 'event_exhibitor_id'=> $id ];
        $where = $status == 'confirm' ? Arr::collapse([ $whereid, ['status' => '1', 'status_visitor' => '1' ] ]):  $whereid; 
        // return response()->json($where,200);
        $matches = $status == 'confirm' ? MatchRequest::where($where)->get() : MatchRequest::where($where)->where(function($query) {
            $query->where('status', '<>','1')
                  ->orwhere('status_visitor', '<>', '1');
        })->get();
        $tanggal = $matches->reverse()->unique('date')->reverse();
        
 
 
        $data = [];
        foreach ($tanggal as $key => $value) {
            $m['tanggal'] = Carbon::createFromDate($value->date)->format('d M, Y ');
            $m['hari']   = Carbon::parse($value->date)->format('l');
            
            $n=array();
            foreach($matches as $match){
                if($value->date == $match->date){
                    $n[]= array(
                                 'id'            => $match->id,
                                 'logo_PT'       => 'logo1.jpg',
                                 'nama_PT'       => $match->exhibitor->company->company_name,
                                 'lokasi'        => $match->location,
                                 'catatan'       => $match->notes,
                                 'visitor_name'  => $match->visitor->visitor_name,
                                 'visitor_email' => $match->visitor->visitor_email,
                             );
                }
            }
            $m['business_match'] = $n;
            $data[] = $m;
         //   $data[] = [
         //     'tanggal'           => Carbon::createFromDate($value->date)->format('d M, Y '),
         //     'hari'              => Carbon::parse($value->date)->format('l'),
         //     'business_match'    => $matches->map(function( $item ) use( $value ) {
         //             if ( $value->date == $item->date) {
         //                 return array(
         //                         'id'            => $item->id,
         //                         'logo_PT'       => 'logo1.jpg',
         //                         'nama_PT'       => $item->exhibitor->company->company_name,
         //                         'lokasi'        => $item->location,
         //                         'catatan'       => $item->notes,
         //                         'visitor_name'  => $item->visitor->visitor_name,
         //                         'visitor_email' => $item->visitor->visitor_email,
         //                     );
         //             }
         //         })->filter()
         //   ];
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
          if (!$matches->isEmpty()) {
             return response()->json([
                     'success'   => true,
                     'message'   => 'Data Successfull Found',
                     'data'      => $data
                 ],200);
         } else {
             return response()->json([
                 'success'   => False,
                 'message'   => 'Data Not Found',
                 'data'      => ''
             ],404);
         }
       
        
    }
    public function list_matching(Request $request){
        if ($request->is('matchExhibitor')) {
            $matches = MatchRequest::where('event_exhibitor_id', $request->id_user)->get();
         
        }else{
             $matches = MatchRequest::where('visitor_id', $request->id_user)->get();
        }
           $data = [];
            $bm=[];

            foreach ($matches as $key => $match) {
            
              $bm[] = [
              'company_name' => $match->exhibitor->company->company_name,
              'jam' => $match->date,
              'lokasi' => $match->location,
                ];

                 $data[]  = [
                 'id' => $match->id,
                 'hari' => $match->date,
                 'tanggal' => $match->date,
                 'bussines_matching' => $bm
                ];
               
        }
           return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull founded',
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
        $time               = Carbon::parse($request->input('time'))->format('h:i:s');
       
        try {
            $match = MatchRequest::create([
                'date'                      => $date,
                'location'                  => $location,
                'time'                      => $time,
                'event_exhibitor_id'        => $exhibitor_id,
                'visitor_id'                => $visitor_id,
                'status_visitor'            => '1'
            ]);
            return response()->json([
                'success'   => true,
                'message'   => 'Data Succesfull Created',
                'data'      => collect($match)->except(['created_at','updated_at'])
            ],201);
        } catch (Exception $e) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Failed to Create',
                'data'      => $e->getMessage()
            ],503);
        }
    }
    public function update(Request $request, $match, $type)
    {
        $column = $type == 'visitor' ? 'status_visitor' : 'status';
        $othercolumn = $type == 'visitor' ? 'status' : 'status_visitor';
        try{
            $update = MatchRequest::where(['id'=> $match])
            ->update([
                    'date'       => date('Y-m-d', strtotime($request->input('date'))),
                    'time'       => Carbon::parse(date('H:i:s',strtotime($request->input('time')))),
                    $column      => '1',
                    $othercolumn => '0' 
                ]);
            
                return response()->json([
                    'success'   => true,
                    'message'   => 'Data Success to Save',
                    'data'      => $update
                ],201);
        } catch (\Exception $e){
            $response = $e->getMessage();
            return response()->json([
                'success'   => true,
                'message'   => 'Data Failed to Save',
                'data'      => $e->getMessage()
            ],503);
        }
    }
    public function approve($match, $type)
    {
        $column = $type == 'visitor' ? 'status_visitor' : 'status';
        try{
            $update = MatchRequest::where(['id'=> $match])->update([ $column      => '1' ]);
            
            return response()->json([
                'success'   => true,
                'message'   => 'Data Success to Save',
                'data'      => $update
            ],201);
        } catch (\Exception $e){
            $response = $e->getMessage();
            return response()->json([
                'success'   => true,
                'message'   => 'Data Failed to Save',
                'data'      => $e->getMessage()
            ],503);
        }
    }
}
