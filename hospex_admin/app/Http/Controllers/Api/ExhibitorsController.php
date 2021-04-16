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
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $data = [];
        if($event){
            $exhibitors = EventExhibitor::join('company', 'company.id', '=', 'event_exhibitors.company_id')->where('event_id',$event->id)->select('event_exhibitors.*')->orderBy('company.company_name')->get();
            // $exhibitors = EventExhibitor::join('events', 'events.id', '=', 'event_exhibitors.event_id')
            //         ->select('event_exhibitors.*','events.begin')
            //         ->whereDate('events.begin',' >= ',$t)
            //         ->orderBy('events.begin')
            //         ->get();

            $exclude = [];
            if(!$exhibitors->isEmpty()){
                foreach ($exhibitors as $exhibitor) {
                    $data[] = [
                        'id_exhibitor'  => $exhibitor->id,
                        'nama'          => $exhibitor->company->company_name,
                        'alamat'        => $exhibitor->company->users[0]->address,
                        'website'       => $exhibitor->company->company_web,
                        'email'         => $exhibitor->company->users[0]->email,
                        'info'          => $exhibitor->company->company_info,
                        'event_title'   => $exhibitor->event->event_title,
                        'logo'          => $exhibitor->company->image,
                        'sponsor'       => true,
                        'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                            return $item->category_name;
                        })->implode(', '),
                    ];

                    $exclude[] = $exhibitor->company->id;
                }
            }

            $exhibitorsExclude = EventExhibitor::join('company', 'company.id', '=', 'event_exhibitors.company_id')->whereNotIn('event_exhibitors.company_id',$exclude)->select('event_exhibitors.*')->orderBy('company.company_name')->get();
            if(!$exhibitorsExclude->isEmpty()){
                foreach ($exhibitorsExclude as $exhibitorExclude) {
                    $data[] = [
                        'id_exhibitor'  => $exhibitorExclude->id, 
                        'nama'          => $exhibitorExclude->company->company_name,
                        'alamat'        => $exhibitorExclude->company->users[0]->address,
                        'website'       => $exhibitorExclude->company->company_web,
                        'email'         => $exhibitorExclude->company->users[0]->email,
                        'info'          => $exhibitorExclude->company->company_info,
                        'event_title'   => $exhibitorExclude->event->event_title,
                        'logo'          => $exhibitorExclude->company->image,
                        'sponsor'       => false,
                        'categories'    => $exhibitorExclude->company->categories()->get()->map(function($item) {
                            return $item->category_name;
                        })->implode(', '),
                    ];
                }
            }
        }
        else{
            $exhibitors = EventExhibitor::join('company', 'company.id', '=', 'event_exhibitors.company_id')->select('event_exhibitors.*')->orderBy('company.company_name')get();
            if(!$exhibitors->isEmpty()){
                foreach ($exhibitors as $exhibitor) {
                    $data[] = [
                        'id_exhibitor'  => $exhibitor->id, 
                        'nama'          => $exhibitor->company->company_name,
                        'alamat'        => $exhibitor->company->users[0]->address,
                        'website'       => $exhibitor->company->company_web,
                        'email'         => $exhibitor->company->users[0]->email,
                        'info'          => $exhibitor->company->company_info,
                        'event_title'   => $exhibitor->event->event_title,
                        'logo'          => $exhibitor->company->image,
                        'sponsor'       => false,
                        'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                            return $item->category_name;
                        })->implode(', '),
                    ];
                }
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Data Found',
            'data'      => $data,
            'status'    => 200
        ],200);
    }

    public function show($exhibitor)
    {
        $exhibitor = EventExhibitor::where('id',$exhibitor)->first();

        if($exhibitor){
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

            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data,
                'status'    => 200
            ],200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Data not Found',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }
}
