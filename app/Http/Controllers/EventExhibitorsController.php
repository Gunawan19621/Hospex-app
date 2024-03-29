<?php

namespace App\Http\Controllers;

use App\EventExhibitor;
use App\Event;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Validator;

class EventExhibitorsController extends Controller
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
        $title = 'Exhibitor List';
        if(request()->ajax()){
            $array = [];
            $exhibitors = EventExhibitor::orderBy('id','desc')->get();
            foreach($exhibitors as $exhibitor){
                $array[] = [
                    'id'                => $exhibitor->id,
                    'company_name'      => $exhibitor->company->company_name,
                    'email'             => $exhibitor->company->users[0]->email,
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
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                            </div>
                        </span>';
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
    public function create($event = null)
    {
        $title = 'Add Exhibitor';
        $companies = Company::whereHas('users', function ($query) {
                    $query->where('type','exhibitor');            
                })->get();
        $events     = $event == null ? Event::orderBy('id','desc')->get() : Event::whereId($event)->orderBy('id','desc')->get();
        // dd($events);
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
       
        $validator = Validator::make($request->all(),
                [
                    'event_id' => ['required','numeric' ], 
                    'company_id.*' => ['required','numeric', 'distinct', 'unique:event_exhibitors,company_id,NULL,id,event_id,' . $request->event_id]
                ],
                [
                    'company_id.*.unique' => ':input-has been already taken',
                ]
            );
  
        
        if ($validator->fails()) {
            // Handle failed logic
            $response = '0-Exhibitor Failed to Save';
             return redirect()->back()->withInput($request->all())->withErrors($validator->errors())->with('status',$response);
        }else{
            
            $data = [];
            foreach ($request->company_id as $key => $value) {
                $data[]=[
                    'event_id'      => $request->event_id,
                    'company_id'    => $value,
                ];
            }
            $create = EventExhibitor::insert($data);
            $response = $create ? '1-Exhibitor Saved' : '0-Exhibitor Failed to Save';
            return redirect('/exhibitors')->with('status',$response);
        }
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
        $companies  = Company::whereHas('users', function ($query) {
                    $query->where('type','exhibitor');            
                })->get();
        $events     = Event::orderBy('id','desc')->get();
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
        $request->validate(['event_id' => 'required|numeric', 'company_id' => [
            'required','numeric',
            Rule::exists('event_exhibitors')->where(function ($query) use($request) {
                $query->where('company_id', $request->company_id);
            })
            ]]);
        $update = EventExhibitor::where('id', $exhibitor->id)
                        ->update([
                            'event_id'      => $request->event_id,
                            'company_id'       => $request->company_id
                        ]);
        $response = $update ? '1-Exhibitor Updated' : '0-Exhibitor Failed to Update';
        return redirect('/exhibitors')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventExhibitor  $eventExhibitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventExhibitor $exhibitor)
    {
        $delete = EventExhibitor::destroy($exhibitor->id);
        $response = $delete ? '1-Exhibitor Deleted' : '0-Exhibitor Failed to Delete';
        return response()->json('1-Exhibitor Deleted', 200);
        // return redirect('/exhibitors')->with('status',$response);
    }
}
