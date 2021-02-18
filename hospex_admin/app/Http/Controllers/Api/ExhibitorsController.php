<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Collection;
use App\EventExhibitor;
use App\Event;
use Illuminate\Support\Carbon;
use App\Helpers\GetEvent as eventId;
use App\Http\Controllers\Controller;

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
        $event = Event::whereDate('events.begin',' <= ',$t)->whereDate('events.end',' >= ',$t)->first();

        if($event){
            $exhibitors = EventExhibitor::where('event_id',$event->id)->get();
            // $exhibitors = EventExhibitor::join('events', 'events.id', '=', 'event_exhibitors.event_id')
            //         ->select('event_exhibitors.*','events.begin')
            //         ->whereDate('events.begin',' >= ',$t)
            //         ->orderBy('events.begin')
            //         ->get();
            
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
                    'logo'          => $exhibitor->company->image,
                    'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                        return $item->category_name;
                    })->implode(', '),
                ];
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data,
                'status'    => 200
            ],200);
        }
        else{
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => [],
                'status'    => 503
            ],503);
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
                'data'      => $data,
                'status'    => 200
            ],200);
        }
        else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => [],
                'status'    => 503
            ],503);
        }
    }
}
