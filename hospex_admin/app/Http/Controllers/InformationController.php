<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
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
        $title = 'Information';
        if (request()->ajax()) 
        {
            return datatables()->of(Information::orderBy('id','desc')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('information/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>
                                </div>
                            </span>';
                            return $button;
                        })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $information = Information::first();
        if($information){
            $create = false;
        }
        else{
            $create = true;
        }

        return view('information.index', compact('title','create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('information.create');
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
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            'web'     => 'required',
            'about'   => 'required'
        ]);

        $create = new Information();
        $create->name     = $request->name;
        $create->email    = $request->email;
        $create->phone    = $request->phone;
        $create->address  = $request->address;
        $create->web      = $request->web;
        $create->about    = $request->about;
        $create->save();

        $response = $create ? '1-Information Saved' : '0-Information Failed to Save';
        return redirect('/information')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            'web'     => 'required',
            'about'   => 'required'
        ]);

        $update = Information::where('id', $information->id)->first();
        $update->name     = $request->name;
        $update->email    = $request->email;
        $update->phone    = $request->phone;
        $update->address  = $request->address;
        $update->web      = $request->web;
        $update->about    = $request->about;
        $update->save();

        $response = $update ? '1-Information Updated' : '0-Information Failed to Update';
        return redirect('/information')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $delete = Information::destroy($information->id);
        $response = $delete ? '1-Information Deleted' : '0-Information Failed to Delete';
        return response()->json('1-Information Deleted', 200);
        // return redirect('/information')->with('status',$response);
    }

    public function getInformation()
    {
        $information['data'] = Information::orderBy('id','desc')->get();
        return $information;
    }
}
