<?php

namespace App\Http\Controllers;

use App\Area;
use App\Event;
use Illuminate\Http\Request;

class AreasController extends Controller
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
        $title = 'Areas';
        if (request()->ajax()) 
        {
            return datatables()->of(Area::all())
                    ->addIndexColumn()
                    ->addColumn('event_location', function($data){  return  $data->event->event_location; })
                    ->addColumn('note', function($data){  return  $data->event->event_title.'-'.$data->event->year; })
                    ->addColumn('action', function($data){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('areas/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                    <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data->id.'" ><i class="la la-trash"></i> Hapus</a> 
                                </div>
                            </span>';
                            // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                            return $button;
                        })
                    ->rawColumns(['action','note','event_location'])
                    ->make(true);
        }
        return view('area.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event = null)
    {
        $title = 'Add Areas';
        $events = $event == null ? Event::all() :  Event::whereId($event)->get();
        return view('area.create', compact('title','events'));
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
            'area_name'     => 'required',
            'event_id'      => 'required|numeric'
        ]);
        $create = Area::create($request->all());
        $response = $create ? '1-Area Saved' : '0-Area Failed to Save';

        return redirect('/areas')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $title = 'Edit Area';
        $events = Event::all();
        return view('area.edit', compact('title','area','events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate( [ 'event_id' => 'required|numeric', 'area_name' => 'required' ] );
        $update=Area::where('id', $area->id)
            ->update([
            'area_name'     => $request->area_name,
            'event_id'      => $request->event_id,
        ]);
       
        $response = $update ? '1-Area Updated' : '0-Area Failed to Update';
        return redirect('/areas')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $delete = Area::destroy($area->id);
        $response = $delete ? '1-Area Deleted' : '0-Area Failed to Delete';
        return response()->json('1-Area Deleted', 200);
        // return redirect('/areas')->with('status',$response);
    }
}
