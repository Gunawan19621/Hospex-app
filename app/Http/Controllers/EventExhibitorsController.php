<?php

namespace App\Http\Controllers;

use App\EventExhibitor;
use App\Event;
use App\Company;
use Illuminate\Http\Request;

class EventExhibitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Exhibitor List';
        if(request()->ajax()){
            $array = [];
            $exhibitors = EventExhibitor::all();
            foreach($exhibitors as $exhibitor){
                $array[] = [
                    'id'                => $exhibitor->id,
                    'company_name'      => $exhibitor->company->company_name,
                    'event_info'        => $exhibitor->event->event_title.' ('.$exhibitor->event->year.')'
                ];
                
            }
            return datatables()->of($array)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('exhibitors/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                        return $button;
                    })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('exhibitor.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Exhibitor';
        $companies = Company::all();
        $events     = Event::all();
        return view('exhibitor.create', compact('title','companies','events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['event_id' => 'required|numeric', 'company_id' => 'required|numeric']);
        EventExhibitor::create($request->all());
        return redirect('/exhibitors/')->with('status','Exhibitor Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventExhibitor  $eventExhibitor
     * @return \Illuminate\Http\Response
     */
    public function show(EventExhibitor $eventExhibitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventExhibitor  $eventExhibitor
     * @return \Illuminate\Http\Response
     */
    public function edit(EventExhibitor $exhibitor)
    {
        $title  = 'Edit Exhibitor';
        $companies  = Company::all();
        $events     = Event::all();
        return view('exhibitor.edit',compact('title','exhibitor','companies','events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventExhibitor  $eventExhibitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventExhibitor $exhibitor)
    {
        $request->validate(['event_id' => 'required|numeric', 'company_id' => 'required|numeric']);
        EventExhibitor::where('id', $exhibitor->id)
                        ->update([
                            'event_id'      => $request->event_id,
                            'company_id'       => $request->company_id
                        ]);
        return redirect('/exhibitors')->with('status','Exhibitor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventExhibitor  $eventExhibitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventExhibitor $eventExhibitor)
    {
        //
    }
}
