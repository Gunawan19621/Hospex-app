<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\MatchRequest;
use App\AvailableSchedule;
use App\User;
use App\EventVisitor;
use App\EventExhibitor;
use App\Event;
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
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $data = [];
        if($event){
            $user = User::where('id',$id)->first();
            if($status == 'confirm'){
                $status = '1';
            }
            else if($status == 'decline'){
                $status = '2';
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
                    ->where('available_schedules.event_id', $event->id)
                    ->orderBy('match_requests.id','desc')
                    ->get();
            }
            else{
                $matches = MatchRequest::join('event_exhibitors', 'event_exhibitors.id', '=', 'match_requests.event_exhibitor_id')
                    ->join('available_schedules', 'available_schedules.id', '=', 'match_requests.available_schedule_id')
                    ->select('match_requests.*','event_exhibitors.event_id','event_exhibitors.company_id','available_schedules.time','available_schedules.date')
                    ->where('event_exhibitors.company_id',$user->company->id)
                    ->where('match_requests.status', $status)
                    ->where('available_schedules.event_id', $event->id)
                    ->orderBy('match_requests.id','desc')
                    ->get();
            }

            if(!$matches->isEmpty()){
                $tanggal = $matches->reverse()->unique('date')->reverse();
     
                foreach ($tanggal as $key => $value) {
                    $m['tanggal'] = Carbon::createFromDate($value->date)->format('d M, Y ');
                    $m['hari']    = Carbon::parse($value->date)->format('l');
                    
                    $n = array();
                    foreach($matches as $match){
                        if($value->date == $match->date){
                            $o = array(
                                'id'              => $match->id,
                                'logo_PT'         => $match->exhibitor->company->image,
                                'nama_PT'         => $match->exhibitor->company->company_name,
                                'visitor_logo'    => $match->visitor->company->image,
                                'visitor_company' => $match->visitor->company->company_name,
                                'visitor_name'    => $match->visitor->company->users[0]->name,
                                'visitor_email'   => $match->visitor->company->users[0]->email,
                                'visitor_phone'   => $match->visitor->company->users[0]->phone,
                                'visitor_address' => $match->visitor->company->users[0]->address,
                                'time'            => $match->availableSchedule->time,
                            );

                            if ($match->status == '1') {
                                $o['status'] = 'Confirm';
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
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Successfull Found',
            'data'      => $data,
            'status'    => 200
        ],200);
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
                    $checkMatchRequest = MatchRequest::where('event_visitor_id', $checkEventVisitor->id)->where('event_exhibitor_id',(int) $exhibitor_id)->where('available_schedule_id', (int) $time)->whereIn('status',['0','1'])->first();

                    if($checkMatchRequest == null){
                        $match = MatchRequest::create([
                            'available_schedule_id'     => (int) $time,
                            'event_exhibitor_id'        => (int) $exhibitor_id,
                            'event_visitor_id'          => $checkEventVisitor->id,
                            'status'                    => '0'
                        ]);
                    }
                    else{
                        $match = '';
                    }
                }
                else{
                    $createEventVisitor = EventVisitor::create([
                        'company_id' => $userVisitor->company_id,
                        'event_id'   => $checkAvailable->event->id
                    ]);

                    $checkMatchRequest = MatchRequest::where('event_visitor_id', $createEventVisitor->id)->where('event_exhibitor_id',(int) $exhibitor_id)->where('available_schedule_id', (int) $time)->whereIn('status',['0','1'])->first();

                    if($checkMatchRequest == null){
                        $match = MatchRequest::create([
                            'available_schedule_id'     => (int) $time,
                            'event_exhibitor_id'        => (int) $exhibitor_id,
                            'event_visitor_id'          => $createEventVisitor->id,
                            'status'                    => '0'
                        ]);
                    }
                    else{
                        $match = '';
                    }
                }

                if($match != ''){
                    $eventExhibitor = EventExhibitor::where('id',(int) $exhibitor_id)->first();
                    if($eventExhibitor){
                        if($eventExhibitor->company->users[0]->device_token != null && $eventExhibitor->company->users[0]->device_token != ''){
                            $notification = [
                                'title' => 'Hospex',
                                'body'  => $userVisitor->name.' ('.$userVisitor->company->company_name.') meminta request business matching untuk tanggal '.$checkAvailable->date.' jam '.$checkAvailable->time,
                            ];
                            $data = [
                                'type'    => 'Business Matching',
                                'item_id' => (string) $match->id
                            ];
                            $url = 'https://fcm.googleapis.com/fcm/send';
                            $fields = array(
                                'to'           => $eventExhibitor->company->users[0]->device_token,
                                'notification' => $notification,
                                'data'         => $data
                            );
                            $fields = json_encode($fields);
                            $headers = array(
                                'Authorization: key=AAAAy3vr5HI:APA91bErFkQmK3FjL_3DHiwn7qgcwDCZmkMnW-C5_-QqgjqUvnOBL1E2E6wfZyFEG2UZa87TmOA_OsI0fnoAkK9vGb_VOGXXSQBl7gYLAbS8KAmC0hE5IPLIsm-yfF3Z5PkPbfnyKEyX',
                                'Content-Type: application/json'
                            );

                            $ch = curl_init ();
                            curl_setopt ( $ch, CURLOPT_URL, $url );
                            curl_setopt ( $ch, CURLOPT_POST, true );
                            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

                            $result = curl_exec ( $ch );
                            // echo $result;
                            curl_close ( $ch );
                        }
                    }
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

    public function approve($match)
    {
        try{
            $approve = MatchRequest::where([
                'id' => $match
            ])->update(['status' => '1']);
            $dateExh = MatchRequest::findorfail($match);
            $data    = MatchRequest::where([
                'event_exhibitor_id'    => $dateExh->event_exhibitor_id,
                'available_schedule_id' => $dateExh->available_schedule_id,
                'status'                => '0'
            ])->update(['status' => '2']);

            if($approve){
                $eventVisitor = EventVisitor::where('id',$dateExh->event_visitor_id)->first();
                $eventExhibitor = EventExhibitor::where('id',$dateExh->event_exhibitor_id)->first();

                if($eventVisitor){
                    if($eventVisitor->company->users[0]->device_token != null && $eventVisitor->company->users[0]->device_token != ''){
                        $notification = [
                            'title' => 'Hospex',
                            'body'  => $eventExhibitor->company->company_name.' approve your request business matching ('.$dateExh->availableSchedule->date.' '.$dateExh->availableSchedule->time.')',
                        ];
                        $data = [
                            'type'    => 'Business Matching',
                            'item_id' => (string) $dateExh->id
                        ];
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $fields = array(
                            'to'           => $eventVisitor->company->users[0]->device_token,
                            'notification' => $notification,
                            'data'         => $data
                        );
                        $fields = json_encode($fields);
                        $headers = array(
                            'Authorization: key=AAAAy3vr5HI:APA91bErFkQmK3FjL_3DHiwn7qgcwDCZmkMnW-C5_-QqgjqUvnOBL1E2E6wfZyFEG2UZa87TmOA_OsI0fnoAkK9vGb_VOGXXSQBl7gYLAbS8KAmC0hE5IPLIsm-yfF3Z5PkPbfnyKEyX',
                            'Content-Type: application/json'
                        );

                        $ch = curl_init ();
                        curl_setopt ( $ch, CURLOPT_URL, $url );
                        curl_setopt ( $ch, CURLOPT_POST, true );
                        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

                        $result = curl_exec ( $ch );
                        // echo $result;
                        curl_close ( $ch );
                    }
                }
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Data Success to Save',
                'data'      => '',
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

    public function reject($match)
    {
        try{
            $reject = MatchRequest::where([
                'id' => $match
            ])->update(['status' => '2']);
            $dateExh = MatchRequest::findorfail($match);
            $data    = MatchRequest::where([
                'event_exhibitor_id'    => $dateExh->event_exhibitor_id,
                'available_schedule_id' => $dateExh->available_schedule_id,
                'status'                => '0'
            ])->update(['status' => '2']);

            if($reject){
                $eventVisitor = EventVisitor::where('id',$dateExh->event_visitor_id)->first();
                $eventExhibitor = EventExhibitor::where('id',$dateExh->event_exhibitor_id)->first();
                
                if($eventVisitor){
                    if($eventVisitor->company->users[0]->device_token != null && $eventVisitor->company->users[0]->device_token != ''){
                        $notification = [
                            'title' => 'Hospex',
                            'body'  => $eventExhibitor->company->company_name.' approve your request business matching ('.$dateExh->availableSchedule->date.' '.$dateExh->availableSchedule->time.')',
                        ];
                        $data = [
                            'type'    => 'Business Matching',
                            'item_id' => (string) $dateExh->id
                        ];
                        $url = 'https://fcm.googleapis.com/fcm/send';
                        $fields = array(
                            'to'           => $eventVisitor->company->users[0]->device_token,
                            'notification' => $notification,
                            'data'         => $data
                        );
                        $fields = json_encode($fields);
                        $headers = array(
                            'Authorization: key=AAAAy3vr5HI:APA91bErFkQmK3FjL_3DHiwn7qgcwDCZmkMnW-C5_-QqgjqUvnOBL1E2E6wfZyFEG2UZa87TmOA_OsI0fnoAkK9vGb_VOGXXSQBl7gYLAbS8KAmC0hE5IPLIsm-yfF3Z5PkPbfnyKEyX',
                            'Content-Type: application/json'
                        );

                        $ch = curl_init ();
                        curl_setopt ( $ch, CURLOPT_URL, $url );
                        curl_setopt ( $ch, CURLOPT_POST, true );
                        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

                        $result = curl_exec ( $ch );
                        // echo $result;
                        curl_close ( $ch );
                    }
                }
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Data Success to Save',
                'data'      => '',
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
}
