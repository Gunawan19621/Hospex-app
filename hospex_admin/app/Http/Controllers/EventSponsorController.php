<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Company;
use App\EventSponsor;

class EventSponsorController extends Controller
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
        $title = 'Sponsors';
        if (request()->ajax()) {
            return datatables()->of(EventSponsor::all())
                ->addIndexColumn()
                ->addColumn('event_title', function($data){
                    return $data->event->event_title;
                })
                ->addColumn('company_name', function($data){
                    return $data->company->company_name;
                })
                ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('/sponsors/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        $button .= '<a href="'.url('/sponsors/'.$data->id.'').'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>';
                        return $button;
                    })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sponsor.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = 'Add Sponsor';
        $events   = Event::all();
        $companies  = Company::all();
        return view('sponsor.create', compact('title','events','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [ 'event_id' => 'required|numeric', 'sponsor_name' => 'required' ] );
        $data= [];
        foreach ($request->company_id as $key => $value) {
            $data[] = [
                'company_id'    => $value, 
                'event_id'      => $request->event_id, 
                'sponsor_name'  => $request->sponsor_name
            ];
        }
        $create = EventSponsor::insert($data);
        $response = $create ? '1-Sponsor Saved!' : '0-Sponsor Failed to Save!';
        return redirect('/sponsors')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventSponsor  $eventSponsor
     * @return \Illuminate\Http\Response
     */
    public function show(EventSponsor $sponsor)
    {
        return $sponsor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventSponsor  $eventSponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(EventSponsor $sponsor)
    {
        $title = 'Edit Sponsor';
        $events   = Event::all();
        $companies  = Company::all();
        return view('sponsor.edit', compact('title', 'sponsor','companies', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventSponsor  $eventSponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventSponsor $sponsor)
    {
        $request->validate( [ 'event_id' => 'required|numeric', 'sponsor_name' => 'required' ] );
        $data= [
            'company_id'    => $request->company_id, 
            'event_id'      => $request->event_id, 
            'sponsor_name'  => $request->sponsor_name
        ];
        
        $update = EventSponsor::whereId($sponsor->id)->update($data);
       
        $response = $update ? '1-Sponsor Updated!' : '0-Sponsor Failed to Update!';
        return redirect('/sponsors')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventSponsor  $eventSponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventSponsor $eventSponsor)
    {
        //
    }
}
