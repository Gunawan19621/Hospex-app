<?php

namespace App\Http\Controllers;

use App\MatchRequest as Match;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MatchRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Match Requests';
        if(request()->ajax()){
            return datatables()->of(Match::where('status','1')->get())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){  return  $data->exhibitor->event->event_title.' - ' . $data->exhibitor->event->year; })
                    ->addColumn('date', function($data){  return  $data->availableSchedule->date; })
                    ->addColumn('time', function($data){  return  $data->availableSchedule->time; })
                    ->editColumn('status', function(Match $match) {
                        // return ( $match->status == 1? 
                        //     // '<a href="#" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill"><span> <i class="fa fa-calendar-check-o"></i><span>Approve</span></span></a>'
                        //     'Approve'
                        //     : 
                        //     // '<a href="'.url('matches/'.$match->id.'/approve').'" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" ><span><i class="fa fa-calendar-check-o"></i><span>Pending</span></span></a>'
                        //     'Pending'
                        //     );

                        $status = '';
                        if($match->status == 0){
                            $status = 'Pending';
                        }
                        else if($match->status == 1){
                            $status = 'Approve';
                        }
                        else if($match->status == 2){
                            $status = 'Reject';
                        }

                        return $status;
                    })
                    // ->editColumn('status', function(Match $match) {
                    //     return ( $match->status_meeting == 0? 
                    //         '<a href="javascript::void(0);" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" >
                    //             <span><i class="fa fa-calendar-check-o"></i><span>Unconfirm</span></span>
                    //         </a>'
                    //         : 
                    //         '<a href="#" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill">
                    //             <span> <i class="fa fa-calendar-check-o"></i><span>Confirm</span></span>
                    //         </a>');
                    // })
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->company->users[0]->name;
                    })
                    ->addColumn('visitor_company', function($data){
                        return $data->visitor->company->company_name;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->visitor->company->users[0]->email;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
                    })
                ->rawColumns(['visitor_name','visitor_company','visitor_email','exhibitor_name','status'])
                ->make(true);
        }
        return view('match.index',compact('title'));
    }
    
    public function pendingMatch()
    {
        if(request()->ajax()){
            return datatables()->of(Match::where('status','0')->get())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){  return  $data->exhibitor->event->event_title.' - ' . $data->exhibitor->event->year; })
                    ->addColumn('date', function($data){  return  $data->availableSchedule->date; })
                    ->addColumn('time', function($data){  return  $data->availableSchedule->time; })
                    ->editColumn('status', function(Match $match) {
                        // return ( $match->status == 1? 
                        //     // '<a href="#" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill"><span> <i class="fa fa-calendar-check-o"></i><span>Approve</span></span></a>'
                        //     'Approve'
                        //     : 
                        //     // '<a href="'.url('matches/'.$match->id.'/approve').'" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" ><span><i class="fa fa-calendar-check-o"></i><span>Pending</span></span></a>'
                        //     'Pending'
                        //     );

                        $status = '';
                        if($match->status == 0){
                            $status = 'Pending';
                        }
                        else if($match->status == 1){
                            $status = 'Approve';
                        }
                        else if($match->status == 2){
                            $status = 'Reject';
                        }

                        return $status;
                    })
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->company->users[0]->name;
                    })
                    ->addColumn('visitor_company', function($data){
                        return $data->visitor->company->company_name;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->visitor->company->users[0]->email;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
                    })
                ->rawColumns(['visitor_name','visitor_company','visitor_email','exhibitor_name','status'])
                ->make(true);
        }
        
    }

    public function rejectMatch()
    {
        if(request()->ajax()){
            return datatables()->of(Match::where('status','2')->get())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){  return  $data->exhibitor->event->event_title.' - ' . $data->exhibitor->event->year; })
                    ->addColumn('date', function($data){  return  $data->availableSchedule->date; })
                    ->addColumn('time', function($data){  return  $data->availableSchedule->time; })
                    ->editColumn('status', function(Match $match) {
                        $status = '';
                        if($match->status == 0){
                            $status = 'Pending';
                        }
                        else if($match->status == 1){
                            $status = 'Approve';
                        }
                        else if($match->status == 2){
                            $status = 'Reject';
                        }

                        return $status;
                    })
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->company->users[0]->name;
                    })
                    ->addColumn('visitor_company', function($data){
                        return $data->visitor->company->company_name;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->visitor->company->users[0]->email;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
                    })
                ->rawColumns(['visitor_name','visitor_company','visitor_email','exhibitor_name','status'])
                ->make(true);
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function viewForm($match)
    {
        return view('match.viewForm',compact('match'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Match $matchRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchRequest $matchRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        dd($match);
        
    }
    public function approve(Match $match)
    {
        $update = Match::where('id', $match->id)->update(['status' => '1']);
        if ($update) {
            $visitor_mail   = $match->visitor->company->users[0]->email;
            // $send_visitor = $this->send($visitor_mail);
            $exhibitor_mail = $match->exhibitor->company->users[0]->email;
            // $send_exhibitor = $this->send($exhibitor_mail);
            // if ($send_exhibitor == true || $send_visitor == true) {
                // $response = " \n Email Sent To ";
                // $response .= $send_visitor ? ' Visitor' : '';
                // $response .= $send_exhibitor ? ' Exhibitor' : '';
            // }
            
            return Redirect::back()->with('status', "1-Match Approved");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchRequest $matchRequest)
    {
        //
    }
    public function send($to)
    {
        $data = array(
                'name'  => 'DataDoc',
                'message'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt voluptatum placeat nesciunt quis laborum laboriosam non doloribus illo fuga. Quasi magni incidunt mollitia. Ipsam, fugiat? Unde earum qui tempore recusandae?'
            );
        
        try{
            Mail::to($to)->send(new SendMail($data));
            return true;
        }
        catch (Exception $e){
            return false;
        }
    }
}
