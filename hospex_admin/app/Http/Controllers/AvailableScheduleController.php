<?php

namespace App\Http\Controllers;

use App\AvailableSchedule;
use App\Event;
use Illuminate\Http\Request;

class AvailableScheduleController extends Controller
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
        $title = 'Available Schedule';
        if (request()->ajax()) 
        {
            return datatables()->of(AvailableSchedule::all())
                    ->addIndexColumn()
                    ->addColumn('event_title', function($data){  return  $data->event->event_title; })
                    ->addColumn('action', function($data){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('available-schedule/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                    <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data->id.'" ><i class="la la-trash"></i> Hapus</a> 
                                </div>
                            </span>';
                            return $button;
                        })
                    ->rawColumns(['action','event_title'])
                    ->make(true);
        }
        return view('available_schedule.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event = null)
    {
        $title = 'Add Available Schedule';
        $events = $event == null ? Event::all() : Event::whereId($event)->get();
        return view('available_schedule.create', compact('title','events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'date'     => 'required',
            'time'     => 'required'
        ]);
        $create = AvailableSchedule::create($request->all());
        $response = $create ? '1-AvailableSchedule Saved' : '0-AvailableSchedule Failed to Save';

        return redirect('/available-schedule')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvailableSchedule  $availableSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(AvailableSchedule $availableSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvailableSchedule  $availableSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailableSchedule $availableSchedule)
    {
        $title = 'Edit Available Schedule';
        $events = Event::all();
        return view('available_schedule.edit', compact('title','availableSchedule','events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvailableSchedule  $availableSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvailableSchedule $availableSchedule)
    {
        $request->validate( [ 'date' => 'required', 'time' => 'required' ] );
        $update = AvailableSchedule::where('id', $availableSchedule->id)
            ->update([
                'date'     => $request->date,
                'time'     => $request->time,
        ]);
       
        $response = $update ? '1-AvailableSchedule Updated' : '0-AvailableSchedule Failed to Update';
        return redirect('/available-schedule')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvailableSchedule  $availableSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvailableSchedule $availableSchedule)
    {
        $delete = AvailableSchedule::destroy($availableSchedule->id);
        $response = $delete ? '1-AvailableSchedule Deleted' : '0-AvailableSchedule Failed to Delete';
        return response()->json('1-AvailableSchedule Deleted', 200);
        // return redirect('/available-schedule')->with('status',$response);
    }
}
