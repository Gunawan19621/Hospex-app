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
        // $matches = Match::all();
        // $data = [];
        // foreach ($matches as $key => $match) {
        //     $stands = $match->exhibitor->stands;
        //     $item = '';
        //     foreach ($stands as $key => $stand) {
        //         $item .= $stand->stand_name;
        //         $item = $key === count($stands)-1 ? $item.'.' : $item.', ';
        //     }
        //     $data[]  = [
        //          'company_name' => $match->exhibitor->company->company_name,
        //          'stands'       => $item,
        //         ];
        // }
        // return $data;
        if(request()->ajax()){
            return datatables()->of(Match::where(['status' => '1'])->get())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){  return  $data->exhibitor->event->event_title.' - ' . $data->exhibitor->event->year; })
                    ->addColumn('date', function($data){  return  $data->availableschedule->date; })
                    ->addColumn('time', function($data){  return  $data->availableschedule->time; })
                    ->editColumn('status', function(Match $match) {
                        return ( $match->status_meeting == 0? 
                            // $this->viewForm($match->id)
                            ' <a href="javascript::void(0);" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" >
                                <span><i class="fa fa-calendar-check-o"></i><span>Unconfirm</span></span>
                            </a>'
                            : 
                            '<a href="#" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill">
                                <span> <i class="fa fa-calendar-check-o"></i><span>Confirm</span></span>
                            </a>');
                    })
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->visitor_name;
                    })
                    ->addColumn('visitor_company', function($data){
                        return $data->visitor->company;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->visitor->visitor_email;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
                    })
                    // ->addColumn('action', function($data){
                    //     $button = '<span class="dropdown">
                    //     <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                    //         <div class="dropdown-menu dropdown-menu-right">       
                    //             <a class="dropdown-item" href="'.url('visitors/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                    //             <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                    //         </div>
                    //     </span>';
                    //     // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                    //     return $button;
                    // })
                ->rawColumns(['visitor_name','exhibitor_name','status'])
                ->make(true);
        }
        return view('match.index',compact('title'));
    }
    public function pendingMatch()
    {
        if(request()->ajax()){
            return datatables()->of(Match::whereIn('status',['0','2'])->get())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){  return  $data->exhibitor->event->event_title.' - ' . $data->exhibitor->event->year; })
                    ->addColumn('date', function($data){  return  $data->availableschedule->date; })
                    ->addColumn('time', function($data){  return  $data->availableschedule->time; })
                    ->editColumn('status', function(Match $match) {
                        return ( $match->status == 0? 
                            // $this->viewForm($match->id)
                            ' <a href="javascript::void(0);" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" >
                                <span><i class="fa fa-calendar-check-o"></i><span>Pending</span></span>
                            </a>'
                            : 
                            '<a href="#" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill">
                                <span> <i class="fa fa-calendar-check-o"></i><span>Decline</span></span>
                            </a>');
                    })
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->visitor_name;
                    })
                    ->addColumn('visitor_company', function($data){
                        return $data->visitor->company;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->visitor->visitor_email;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
                    })
                    // ->addColumn('action', function($data){
                    //     $button = '<span class="dropdown">
                    //     <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                    //         <div class="dropdown-menu dropdown-menu-right">       
                    //             <a class="dropdown-item" href="'.url('visitors/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                    //             <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                    //         </div>
                    //     </span>';
                    //     // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                    //     return $button;
                    // })
                ->rawColumns(['visitor_name','exhibitor_name','status'])
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
            $visitor_mail   = $match->visitor->visitor_email;
            $send_visitor = $this->send($visitor_mail);
            $exhibitor_mail = $match->exhibitor->company->company_email;
            $send_exhibitor = $this->send($exhibitor_mail);
            if ($send_exhibitor == true || $send_visitor == true) {
                $response = " \n Email Sent To ";
                $response .= $send_visitor ? ' Visitor' : '';
                $response .= $send_exhibitor ? ' Exhibitor' : '';
            }
            
            return Redirect::back()->with('status', "1-Match Approved ".$response);
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
