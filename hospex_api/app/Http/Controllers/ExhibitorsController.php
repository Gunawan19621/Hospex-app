<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\EventExhibitor;
use Illuminate\Support\Carbon;
use App\Helpers\GetEvent as eventId;

class ExhibitorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $t = Carbon::now();
        $exhibitors = EventExhibitor::join('events', 'events.id', '=', 'event_exhibitors.event_id')
                ->whereDate('events.begin',' >= ',$t)
                ->orderBy('events.begin')
                ->get();
        // $exhibitors = EventExhibitor::all();
        
        $data = [];

        foreach ($exhibitors as $key => $exhibitor) {
            $data[] = [
                'id_exhibitor'  => $exhibitor->id, 
                'nama'          => $exhibitor->company->company_name,
                'alamat'        => $exhibitor->company->users[0]->address,
                'website'       => $exhibitor->company->company_web,
                'email'         => $exhibitor->company->users[0]->email,
                'info'          => $exhibitor->company->company_info,
                'event_title'   => $exhibitor->event->event_title,
                'logo'          => '',
                'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                    return $item->category_name;
                })->implode(', '),
            ];
        }

        if (!$exhibitors->isEmpty()) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        }
        else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],404);
        }
    }

    public function show($exhibitor)
    {
        $exhibitor = EventExhibitor::findorfail($exhibitor);
        $data = [
            'id_exhibitor'  => $exhibitor->id, 
            'nama'          => $exhibitor->company->company_name,
            'alamat'        => $exhibitor->company->users[0]->address,
            'website'       => $exhibitor->company->company_web,
            'email'         => $exhibitor->company->users[0]->email,
            'info'          => $exhibitor->company->company_info,
            'event_title'   => $exhibitor->event->event_title,
            'logo'          => '',
            'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                                    return $item->category_name;
                                })->implode(', '),
            'stand'         => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                                    return  $item->area->area_name .' ( '. $exhibitor->stands()->get()->map(function($stand) use( $item ) {
                                        return ($item->area->id ===  $stand->area_id ? $stand->stand_name : false);
                                    })->filter()->implode(', ').' )' ;
                                })->implode(', '),
        ];
      
        if (count($data) > 0) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        }
        else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],503);
        }
    }
}
