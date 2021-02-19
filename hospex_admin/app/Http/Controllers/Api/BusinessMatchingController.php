<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\MatchRequest;
use App\AvailableSchedule;
use App\User;
use App\EventVisitor;
use App\EventExhibitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use PHPUnit\Framework\MockObject\Builder\Match;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;

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
        $user = User::where('id',$id)->first();
        if($status == 'confirm'){
            $status = '1';
        }
        else{
            $status = '0';
        }

        if($type == 'visitor'){
            $matches = MatchRequest::join('event_visitors', 'event_visitors.id', '=', 'match_requests.event_visitor_id')
                ->join('available_schedules', 'available_schedules.id', '=', 'match_requests.available_schedule_id')
                ->select('match_requests.*','event_visitors.event_id','event_visitors.company_id','available_schedules.time','available_schedules.date')
                ->where('event_visitors.company_id',$user->company->id)
                ->where('match_requests.status', $status)
                ->get();
        }
        else{
            $matches = MatchRequest::join('event_exhibitors', 'event_exhibitors.id', '=', 'match_requests.event_exhibitor_id')
                ->join('available_schedules', 'available_schedules.id', '=', 'match_requests.available_schedule_id')
                ->select('match_requests.*','event_exhibitors.event_id','event_exhibitors.company_id','available_schedules.time','available_schedules.date')
                ->where('event_exhibitors.company_id',$user->company->id)
                ->where('match_requests.status', $status)
                ->get();
        }

        $data = [];
        if(!$matches->isEmpty()){
            $tanggal = $matches->reverse()->unique('date')->reverse();
 
            foreach ($tanggal as $key => $value) {
                $m['tanggal'] = Carbon::createFromDate($value->date)->format('d M, Y ');
                $m['hari']    = Carbon::parse($value->date)->format('l');
                
                $n = array();
                foreach($matches as $match){
                    if($value->date == $match->date){
                        $o = array(
                            'id'            => $match->id,
                            'logo_PT'       => 'logo1.jpg',
                            'nama_PT'       => $match->exhibitor->company->company_name,
                            'visitor_name'  => $match->visitor->company->users[0]->name,
                            'visitor_email' => $match->visitor->company->users[0]->email,
                            'time'          => $match->availableSchedule->time,
                        );

                        if ($match->status == '1') {
                            $o['status'] = 'Approved';
                        }
                        else if($match->status == '2') {
                            $o['status'] = 'Decline';
                        }
                        else{
                            $o['status'] = 'Pending';
                        }
                        
                        $n[]= $o;
                    }
                }
                $m['business_match'] = $n;
                $data[] = $m;    
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }

    public function list_matching(Request $request){
        if ($request->is('matchExhibitor')) {
            $matches = MatchRequest::where('event_exhibitor_id', $request->id_user)->get();
        }
        else{
             $matches = MatchRequest::where('visitor_id', $request->id_user)->get();
        }
        
        $data = [];
        $bm = [];

        if(!$matches->isEmpty()){
            foreach ($matches as $key => $match) {    
                $bm[] = [
                    'company_name' => $match->exhibitor->company->company_name,
                    'jam'          => $match->date,
                    'lokasi'       => $match->location,
                ];

                $data[]  = [
                    'id'                => $match->id,
                    'hari'              => $match->date,
                    'tanggal'           => $match->date,
                    'bussines_matching' => $bm
                ]; 
            }
        }
        
        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull founded',
            'data'      => $data,
            'status'    => 200
        ],200);
    }

    public function show($id)
    {
        // $exhibitor = exhibitor::findorfail($id);
        // $data = [
        //     'company_name'      => $exhibitor->company->company_name,
        //     'company_address'   => $exhibitor->company->company_address,
        //     'company_web'       => $exhibitor->company->company_web,
        //     'company_email'     => $exhibitor->company->company_email,
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
        try {
            if($request->input('time') == null || $request->input('time') == ""){
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data Failed to Create',
                    'data'      => '',
                    'status'    => 403
                ],403);
            }

            $exhibitor_id = $request->input('exhibitor_id');
            $visitor_id   = $request->input('visitor_id');
            $time         = $request->input('time');

            $checkAvailable = AvailableSchedule::where('id',$time)->first();
            if($checkAvailable){
                $userVisitor = User::where('id',$visitor_id)->first();
                $checkEventVisitor = EventVisitor::where('company_id',$userVisitor->company_id)->where('event_id',$checkAvailable->event->id)->first();

                if($checkEventVisitor){
                    $match = MatchRequest::create([
                        'available_schedule_id'     => $time,
                        'event_exhibitor_id'        => $exhibitor_id,
                        'event_visitor_id'          => $checkEventVisitor->id,
                        'status'                    => '0',
                        'time'                      => $checkAvailable->time,
                        'date'                      => $checkAvailable->date
                    ]);
                }
                else{
                    $createEventVisitor = EventVisitor::create([
                        'company_id' => $userVisitor->company_id,
                        'event_id'   => $checkAvailable->event->id
                    ]);

                    $match = MatchRequest::create([
                        'available_schedule_id'     => $time,
                        'event_exhibitor_id'        => $exhibitor_id,
                        'event_visitor_id'          => $createEventVisitor->id,
                        'status'                    => '0',
                        'time'                      => $checkAvailable->time,
                        'date'                      => $checkAvailable->date
                    ]);
                }

                return response()->json([
                    'success'   => true,
                    'message'   => 'Data Succesfull Created',
                    'data'      => $match,
                    'status'    => 201
                ],201);
            }
            else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data Failed to Create',
                    'data'      => '',
                    'status'    => 403
                ],403);
            }
        }
        catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Create',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }

    public function update(Request $request, $match, $type)
    {
        $column      = $type == 'visitor' ? 'status_visitor' : 'status';
        $othercolumn = $type == 'visitor' ? 'status' : 'status_visitor';
        
        try{
            $update = MatchRequest::where(['id'=> $match])->update([
                'date'       => date('Y-m-d', strtotime($request->input('date'))),
                'time'       => Carbon::parse(date('H:i:s',strtotime($request->input('time')))),
                $column      => '1',
                $othercolumn => '0' 
            ]);
            
            return response()->json([
                'success'   => true,
                'message'   => 'Data Success to Save',
                'data'      => $update,
                'status'    => 200
            ],200);
        }
        catch (\Exception $e){
            $response = $e->getMessage();
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Save',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }

    public function approve($match)
    {
        try{
            $approve = MatchRequest::where([
                'id' => $match
            ])->update([ 'status' => '1' ]);
            $dateExh = MatchRequest::findorfail($match);
            $data    = MatchRequest::where([
                'event_exhibitor_id'    => $dateExh->event_exhibitor_id, 
                'available_schedule_id' => $dateExh->available_schedule_id, 
                'status'                => '0',
            ])->update(['status' => '2']);

            return response()->json([
                'success'   => true,
                'message'   => 'Data Success to Save',
                'data'      => $approve,
                'status'    => 200
            ],200);
        }
        catch (\Exception $e){
            $response = $e->getMessage();
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Save',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }

    public function updateStatusMeeting($match)
    {
        try {
            $update = MatchRequest::where('id',$match)->first();

            if($update){
                $update->status_meeting = '1';
                $update->save();

                return response()->json([
                    'success'   => true,
                    'message'   => 'Data Success to Save',
                    'data'      => $update,
                    'status'    => 200
                ],200);
            }
            else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data Failed to Save',
                    'data'      => '',
                    'status'    => 403
                ],403);
            }
        }
        catch (\Exception $e) {
            $response = $e->getMessage();
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Save',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }
}
