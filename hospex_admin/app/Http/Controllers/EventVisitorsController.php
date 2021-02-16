<?php

namespace App\Http\Controllers;

use App\EventVisitor;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventVisitorsController extends Controller
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
        $title = 'Visitors';
        if(request()->ajax()){
            return datatables()->of(EventVisitor::all())
                    ->addIndexColumn()
                    ->addColumn('event', function($data){
                        return $data->event->event_title. ' - '. $data->event->year;
                    })
                    ->addColumn('company', function($data){
                        return $data->company->company_name;
                    })
                    ->addColumn('visitor_name', function($data){
                        return $data->company->users[0]->name;
                    })
                    ->addColumn('visitor_email', function($data){
                        return $data->company->users[0]->email;
                    })
                    ->addColumn('phone', function($data){
                        return $data->company->users[0]->phone;
                    })
                    ->addColumn('action', function($data){
                        $button = '<a href="'. url('visitors/'.$data->id).' " class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>';
                        return $button;
                    })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('visitor.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Visitor';
        $companies      = Company::all();
        return view('visitor.create',compact('title','companies'));
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
            'event_id'    => 'required',
            'company_id'  => 'required|numeric',
        ]);
        $create = EventVisitor::create($request->all());
        $response = $create ? '1-Visitor Saved!' : '0-Visitor Failed to Save!';
        return redirect('/visitors')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventVisitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(EventVisitor $visitor)
    {
        $title = 'Visitor Detail';
        return view('visitor.detail',compact('title','visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventVisitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(EventVisitor $visitor)
    {
        $title = 'Edit Visitor';
        $companies  = Company::all();
        return view('visitor.edit',compact('title','visitor','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventVisitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventVisitor $visitor)
    {
        $request->validate([
            'event_id'    => 'required',
            'company_id'  => 'required|numeric',
        ]);
        $update = EventVisitor::where('id',$visitor->id)
            ->update([
                'event_id'        => $request->event_id,
                'company_id'      => $request->company_id,
            ]);
        $response = $update ? '1-Visitor Updated!' : '0-Visitor Failed to Update!';
        return redirect('/visitors')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventVisitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventVisitor $visitor)
    {
        //
    }
}
