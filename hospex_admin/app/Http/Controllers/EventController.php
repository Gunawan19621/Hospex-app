<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Stand;
use App\Area;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use App\ImageUpload;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        $events = Event::all();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $request->validate([
            'event_title'       => 'required',
            'begin'             => 'required|date_format:Y-m-d',
            'end'               => 'required|date_format:Y-m-d|after_or_equal:'.Carbon::createFromFormat('Y-m-d', $request->begin)->format('Y-m-d'),
            'city'              => 'required',
            'event_location'    => 'required',
            'link_buy_event'    => 'required'
        ]);

        $create = Event::create([
            'event_title'       => $request->event_title,
            'year'              => Carbon::createFromFormat('Y-m-d', $request->begin)->year,
            'city'              => $request->city,
            'site_plan'         => '',
            'event_location'    => $request->event_location,
            'begin'             => Carbon::parse($request->begin),
            'end'               => Carbon::parse($request->end),
            'link_buy_event'    => $request->link_buy_event
        ]);

        $response = $create ? '1-Event Saved' : '0-Event Failed to Save';
        return redirect('/events')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $title = 'Exhibitors';
        $event = Event::findorfail($event->id);
        $schedules = $event->Schedules()->orderBy('date');
        return view('event_schedule.schedules', compact('schedules','event','title'));
    }
    
    public function uploadSiteplan(Event $event)
    {
        $title = 'Site Plan';
        $slice = Arr::only($event->toArray(), ['event_title', 'site_plan']);
        return view('event.form_upload', compact('title','event','slice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $now = Carbon::now();
        $request->validate([
            'event_title'       => 'required',
            'begin'             => 'required|date_format:Y-m-d',
            'end'               => 'required|date_format:Y-m-d|after_or_equal:'.Carbon::createFromFormat('Y-m-d', $request->begin)->format('Y-m-d'),
            'city'              => 'required',
            'event_location'    => 'required',
            'link_buy_event'    => 'required'
        ]);

        $update = Event::where('id', $event->id)->update([
                    'event_title'       => $request->event_title,
                    'year'              => Carbon::createFromFormat('Y-m-d', $request->begin)->year,
                    'begin'             => Carbon::parse($request->begin),
                    'end'               => Carbon::parse($request->end),
                    'city'              => $request->city,
                    'event_location'    => $request->event_location,
                    'link_buy_event'    => $request->link_buy_event
                ]);
        
        $response = $update ? '1-Event Updated' : '0-Event Failed to Update';
        return redirect('/events')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->Schedules){
            foreach ($event->Schedules as $schedule) {
                if($schedule->rundowns){
                    foreach ($schedule->rundowns as $rundown) {
                        $rundown->delete();
                    }
                }
                $schedule->delete();
            }
        }
        $delete = Event::destroy($event->id);
        $response = $delete ? '1-Event Deleted' : '0-Event Failed to Delete';
        return response()->json('1-Event Deleted', 200);
        // return redirect('/events')->with('status',$response);
    }

    public function getevents()
    {
        $events['data'] = Event::all();
        return $events;
    }

    public function stand(Event $event)
    {
        $title = 'Stand Event';
        if(request()->ajax()){
            $data = collect($event->areas)->map(function($item, $key){
                return collect($item->stands)->map(function($stand, $index) use($item){
                    return [
                        'id'                => $stand->id,
                        'stand_name'        => $stand->stand_name,
                        'company_name'      => $stand->exhibitor->company->company_name,
                        'area_name'         => $item->area_name
                    ];
                });
            });
            return datatables()->of($data->collapse())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('stands/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                            </div>
                        </span>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('stand.stand_event', compact('title','event'));
    }

    public function exhibitor(Event $event)
    {
        $exhibitors = $event->exhibitors;
        $data = [];
        foreach ($exhibitors as $key => $exhibitor) {
            $x['id']                = $exhibitor->id;
            $x['company_name']      = $exhibitor->company->company_name;
            $x['company_address']   = $exhibitor->company->company_address;
            $catgories = $exhibitor->company->categories;
            $item = '';
            foreach ($catgories as $key => $category) {
                $item .= $category->category_name;
                $item = $key === count($catgories)-1 ? $item.'.' : $item.', ';
            }
           
            $x['categories']        = $item;
            $data[]=$x;

        }
        $title = 'Exhibitor';
        // dd($event->exhibitors()->with('company'));
        $query = $event->exhibitors()->with('company');
        if(request()->ajax()){
            return datatables()->of($query)
                    ->addIndexColumn()
                    ->addColumn(
                        'email',function($query){ 
                            return $query->company->users[0]->email;
                        }
                    )
                    ->addColumn(
                        'address',function($query){ 
                            return $query->company->users[0]->address;
                        }
                    )
                    ->addColumn(
                        'categories',function($query){ 
                            return $query->company->categories()->get()->map(function($item) {
                                return $item->category_name;
                            })->implode(', ');
                        }
                    )
                    ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('exhibitors/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>     
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                            </div>
                        </span>';
                        return $button;
                    })
                ->rawColumns(['action','company'])
                ->make(true);
        }
        
        return view('exhibitor.event',compact('title','event'));
    }

    public function area(Event $event)
    {
        $title = 'Areas';
        if (request()->ajax()) 
        {
            return datatables()->of($event->areas)
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
                            return $button;
                        })
                    ->rawColumns(['action','note','event_location'])
                    ->make(true);
        }
        return view('area.event_area', compact('title','event'));
    }

    public function availableSchedule(Event $event)
    {
        $title = 'Available Schedule';
        if (request()->ajax()) 
        {
            return datatables()->of($event->availableSchedules)
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
        return view('available_schedule.event', compact('title','event'));
    }

    public function fileStore(Request $request, Event $event)
    {
        if($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            
            // Valid extensions
            $validextensions = array("jpeg","jpg","png","pdf");
            
            // Check extension
            if(in_array(strtolower($extension), $validextensions)){
                
                // Rename file 
                $fileName = Str::slug($event->event_title.' '.$event->year.' '.$event->location).'.' . $extension;
                $up = $request->file('file')->move(public_path('event'), $fileName);
                
                // Delete File if exists
                // if (Storage::disk('logs')->exists($fileName)) {
                //         // Storage::delete(public_path($destinationPath.$fileName));
                //         Storage::disk('logs')->delete($fileName);


                //     }
                    
                    // Uploading file to given path
                   // $request->file('file')->move($destinationPath, $fileName); 
                //    return $fileName;
               
                //   $up =  Storage::disk('logs')->storeAs('event/', $request->file('file'), $fileName);
                // $up = $request->file('file')->storeAs('event/', $fileName);
            
                if ($up == true) {
                    $update = Event::where('id', $event->id)->update([
                        'site_plan' => 'event/'.$fileName
                    ]);
                    
                    return response()->json(['success' => '1']);
                }
                else{
                    return response()->json(['success'=> '0']);
                }
            }
            
        }
    }

    function fetch(Event $event)
    {
        $fileName = $event->siteplan;
        // $file = Storage::get('event/'.$fileName);
        
        // $destinationPath = public_path('images/'.$fileName);
      

        // $filename = 'test.pdf';
        // $path = storage_path($fileName);
        // return Response::make(file_get_contents($destinationPath.$fileName), 200, [
        //         'Content-Type' => 'application/pdf',
        //         'Content-Disposition' => 'inline; filename="'.$fileName.'"'
                
        //     ]);
        // $exists = Storage::exists('event/'.$fileName);
        if ($exists) {
            // $images =  Storage::get('event/'.$fileName);
            // $images = {{ Storage::path('screenshots/1.jpg') }};
            // $output = '<div class="row">';
            // // foreach($images as $image){
            //     $output .= '
            //         <div class="col-md-10"
            //         style="margin-bottom:0px;" align="center">
            //         <embed src="{{'.  $images . '}}"
            //          style="width:1380px; height:800px;" frameborder="0" />
            //         </div>
            //         ';
            //         // <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            // // }
            // $output .= '</div>';
            // echo $output;
            // $headers = [
            //     'Content-Type' => 'application/pdf',
            //  ];
  
            //  return Response::download($images , 'filename');
            // return response()->json($data, 200, $headers);
            $response = Response::make($images,200);
            $response->header('Content-Type', 'application/pdf');
            return $response;
        }else{
            $response = '<p>Belum Ada Data Tersedia</p>';
            return $response;
        }
        // return response()->file($images);
    }

    public function siteplan(Event $event)
    {
        $title = 'Site Plan';
        
        $fileName = $event->site_plan;

        if($fileName == ''){
            $response = '<p>Belum Ada Data Tersedia</p>';
            return $response;
        }
        else{
            return redirect()->to($fileName);
        }
    }

    function dropzoneDelete(Request $request)
    {
        if($request->get('name'))
        {
            \File::delete(public_path('images/'. $request->get('name')));
        }
    }
}
