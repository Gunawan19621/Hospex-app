<?php

namespace App\Http\Controllers;

use App\MatchRequest as Match;
use Illuminate\Http\Request;

class MatchRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Match Requests';
        // $matches = Match::all();
        // $data = [];
        // foreach ($matches as $key => $match) {
        //     $stands = $match->exhibitor->stands;
        //     $item = '';
        //     foreach ($stands as $key => $stand) {
        //         $item .= $stand->stand_name;
        //         $item = $key === count($stands)-1 ? $item.'.' : $item.', ';
        //     }
        //     $data[]  = [
        //          'company_name' => $match->exhibitor->company->company_name,
        //          'stands'       => $item,
        //         ];
        // }
        // return $data;
        if(request()->ajax()){
            return datatables()->of(Match::all())
                    ->addIndexColumn()
                    ->addColumn('visitor_name', function($data){
                        return $data->visitor->visitor_name;
                    })
                    ->addColumn('exhibitor_name', function($data){
                        return $data->exhibitor->company->company_name;
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
                ->rawColumns(['visitor_name','exhibitor_name','action'])
                ->make(true);
        }
        return view('match.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MatchRequest $matchRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchRequest $matchRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchRequest $matchRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MatchRequest  $matchRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchRequest $matchRequest)
    {
        //
    }
}
