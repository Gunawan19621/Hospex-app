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
        $this->middleware('auth');
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
        $request->validate([
            'event_title'       => 'required',
            'year'              => 'required|size:4',
            'city'              => 'required',
            'site_plan'         => 'required',
            'event_location'    => 'required'
        ]);

        // Event::create([
        //     'event_title'       => $request->event_title,
        //     'year'              => $request->year,
        //     'city'              => $request->city,
        //     'site_plan'         => $request->site_plan,
        //     'event_location'    => $request->event_location
        // ]);

        $create = Event::create($request->all());
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
        $schedules = $event->Schedules()
                    ->orderBy('date');
        return view('event_schedule.schedules', compact('schedules','event','title'));
    }
    public function siteplan(Event $event)
    {
        $title = 'Site Plan';
        $slice = Arr::only($event->toArray(), ['event_title', 'site_plan']);
        
        $fileName = $event->site_plan;
        // $destinationPath = public_path('images/');

        if ( Storage::disk('logs')->exists($fileName)) {
            $file = Storage::disk('logs')->get($fileName);
           
            $response = Response::make($file,200);
            $response->header('Content-Type', 'application/pdf');
            return $response;
 
        }
        
        //return view('event.form_upload', compact('slice','title','event','content'));

    }
    public function uploadSiteplan(Event $event)
    {
        $title = 'Site Plan';
        $slice = Arr::only($event->toArray(), ['event_title', 'site_plan']);
        return view('event.form_upload', compact('slice','title','event','content'));
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
        $request->validate([
            'event_title'       => 'required',
            'year'              => 'required|date_format:Y|after_or_equal:now',
            'city'              => 'required',
            'site_plan'         => 'required',
            'event_location'    => 'required'
        ]);
        $update =Event::where('id', $event->id)
                ->update([
                    'event_title'       => $request->event_title,
                    'year'              => $request->year,
                    'city'              => $request->city,
                    'site_plan'         => $request->site_plan,
                    'event_location'    => $request->event_location
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
        $delete = Event::destroy($event->id);
        $response = $delete ? '1-Event Deleted' : '0-Event Failed to Delete';
        return redirect('/events')->with('status',$response);
    }
    public function getevents()
    {
        $events['data'] = Event::all();
        return $events;
    }
    public function area(Event $event)
    {
        $title = 'Stand Event';
        if(request()->ajax()){
            $data = collect($event->areas)->map(function($item, $key){
                return collect($item->stands)->map(function($stand, $index) use($item){
                    return [
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
                                <a class="dropdown-item" href="'.url('exhibitors//edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        $button .= '<a href="{{ url(`events/$data->id`) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>';
                        return $button;
                    })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('stand.stand_event', compact('title'));
    }
    public function exhibitor(Event $event)
    {
        $exhibitors= $event->exhibitors;
        $data=[];
        foreach ($exhibitors as $key => $exhibitor) {
            
            $x['id']      = $exhibitor->id;
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
        $query=$event->exhibitors()
        ->with('company');
        if(request()->ajax()){
            return datatables()->of($query)
                    ->addIndexColumn()
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
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        $button .= '<a href="{{ url(`events/$data->id`) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>';
                        return $button;
                    })
                ->rawColumns(['action','company'])
                ->make(true);
        }
        
        return view('exhibitor.event',compact('title'));
    }
    public function fileStore(Request $request, Event $event)
    {
        if($request->hasFile('file')) {

            // Upload path
            $destinationPath = public_path('images/');
     
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
     
            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
     
            // Valid extensions
            $validextensions = array("jpeg","jpg","png","pdf");
     
            // Check extension
            if(in_array(strtolower($extension), $validextensions)){
     
              // Rename file 
              $fileName = Str::slug($event->event_title.' '.$event->year.' '.$event->location).'.' . $extension;
                
              // Delete File if exists
                // if (file_exists($destinationPath.$fileName)) {
                //     Storage::delete(public_path($destinationPath.$fileName));
                // }
                $update =Event::where('id', $event->id)->update(['site_plan' => $fileName]);
     
              // Uploading file to given path
              $request->file('file')->move($destinationPath, $fileName); 
              return response()->json(['success' => $fileName]);
     
            }
            
        }
    }
    function fetch()
    {

        $fileName = 'hospex-jakarta-2020.pdf';
        $destinationPath = public_path('images/'.$fileName);
      

        // $filename = 'test.pdf';
        // $path = storage_path($fileName);
        // return Response::make(file_get_contents($destinationPath.$fileName), 200, [
        //         'Content-Type' => 'application/pdf',
        //         'Content-Disposition' => 'inline; filename="'.$fileName.'"'
                
        //     ]);
        $exists = Storage::disk('logs')->exists($fileName);
        if ($exists) {
            $images =  Storage::disk('logs')->get($fileName);
            // $images = {{ Storage::path('screenshots/1.jpg') }};
            // $output = '<div class="row">';
            // // foreach($images as $image){
            //     $output .= '
            //         <div class="col-md-10"
            //         style="margin-bottom:0px;" align="center">
            //         <embed src="{{'.  Storage::disk('logs')->get($fileName) . '}}"
            //          style="width:1380px; height:800px;" frameborder="0" />
            //         </div>
            //         ';
            //         // <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            // // }
            // $output .= '</div>';
            // echo $output;
             return Response::make($images, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$fileName.'"'
                
            ]);
        }else{
            echo 'gaada';
        }
        // return response()->file($images);
    }
    function dropzoneDelete(Request $request)
    {
        if($request->get('name'))
        {
            \File::delete(public_path('images/'. $request->get('name')));
        }
    }
}
