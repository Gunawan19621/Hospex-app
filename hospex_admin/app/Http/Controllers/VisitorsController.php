<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Visitors';
        if(request()->ajax()){
            return datatables()->of(Visitor::all())
                    ->addIndexColumn()
                    ->addColumn('company_name', function($data){
                        return $data->company->company_name;
                    })
                    ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('visitors/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                        return $button;
                    })
                ->rawColumns(['company_name','action'])
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
            'visitor_name'    => 'required',
            'visitor_email'   => 'required|email:rfc|unique:event_visitors,visitor_email',
            'company_id'      => 'required|numeric',
        ]);
        $create = Visitor::create($request->all());
        $response = $create ? '1-Visitor Saved!' : '0-Visitor Failed to Save!';
        return redirect('/visitors')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        $title = 'Edit Visitor';
        $companies  = Company::all();
        return view('visitor.edit',compact('title','visitor','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'visitor_name'    => 'required',
            'visitor_email'   => 'required|email:rfc|unique:event_visitors,visitor_email,'.$visitor->id.',id',
            'company_id'      => 'required|numeric',
        ]);
        $update = Visitor::where('id',$visitor->id)
            ->update([
                'visitor_name'    => $request->visitor_name,
                'visitor_email'   => $request->visitor_email,
                'company_id'      => $request->company_id,
            ]);
        $response = $update ? '1-Visitor Updated!' : '0-Visitor Failed to Update!';
        return redirect('/visitors')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
