<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Collection;
use App\EventExhibitor;
use App\Event;
use App\Company;
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
            $exhibitors = EventExhibitor::join('companies', 'companies.id', '=', 'event_exhibitors.company_id')->select('event_exhibitors.*')->where('event_id',$event->id)->orderBy('companies.company_name','asc')->get();

            if(!$exhibitors->isEmpty()){
                $exhibitorSponsor = $exhibitors->where('sponsor',true);

                if(!$exhibitorSponsor->isEmpty()){
                    foreach ($exhibitorSponsor as $exhibitor) {
                        $data[] = [
                            'id_exhibitor'  => $exhibitor->id,
                            'nama'          => $exhibitor->company->company_name,
                            'alamat'        => $exhibitor->company->users[0]->address,
                            'website'       => $exhibitor->company->company_web,
                            'email'         => $exhibitor->company->users[0]->email,
                            'info'          => $exhibitor->company->company_info,
                            'event_title'   => $exhibitor->event->event_title,
                            'logo'          => $exhibitor->company->image,
                            'sponsor'       => $exhibitor->sponsor,
                            'sponsor_name'  => $exhibitor->sponsor_name,
                            'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                                return $item->category_name;
                            })->implode(', '),
                            'area_name'     => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                                return $item->area->area_name;
                            })->implode(', '),
                            'stand_name'    => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                                return $exhibitor->stands()->get()->map(function($stand) use( $item ) {
                                    return ($item->area->id == $stand->area_id ? $stand->stand_name.' ('.$item->area->area_name.')' : '');
                                })->filter()->implode(', ');
                            })->implode(', '),
                            // 'categories'   => $exhibitor->company->categories,
                            'stand'        => $exhibitor->stands,
                            'area'         => $exhibitor->area
                        ];
                    }
                }

                $exhibitorNonSponsor = $exhibitors->where('sponsor',false);

                if(!$exhibitorNonSponsor->isEmpty()){
                    foreach ($exhibitorNonSponsor as $exhibitor) {
                        $data[] = [
                            'id_exhibitor'  => $exhibitor->id,
                            'nama'          => $exhibitor->company->company_name,
                            'alamat'        => $exhibitor->company->users[0]->address,
                            'website'       => $exhibitor->company->company_web,
                            'email'         => $exhibitor->company->users[0]->email,
                            'info'          => $exhibitor->company->company_info,
                            'event_title'   => $exhibitor->event->event_title,
                            'logo'          => $exhibitor->company->image,
                            'sponsor'       => $exhibitor->sponsor,
                            'sponsor_name'  => $exhibitor->sponsor_name,
                            'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                                return $item->category_name;
                            })->implode(', '),
                            'area_name'     => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                                return $item->area->area_name;
                            })->implode(', '),
                            'stand_name'    => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                                return $exhibitor->stands()->get()->map(function($stand) use( $item ) {
                                    return ($item->area->id == $stand->area_id ? $stand->stand_name.' ('.$item->area->area_name.')' : '');
                                })->filter()->implode(', ');
                            })->implode(', '),
                            // 'categories'   => $exhibitor->company->categories,
                            'stand'        => $exhibitor->stands,
                            'area'         => $exhibitor->area
                        ];
                    }
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
                'logo'          => $exhibitor->company->image,
                'sponsor'       => $exhibitor->sponsor,
                'sponsor_name'  => $exhibitor->sponsor_name,
                'categories'    => $exhibitor->company->categories()->get()->map(function($item) {
                    return $item->category_name;
                })->implode(', '),
                'area_name'     => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                    return $item->area->area_name;
                })->implode(', '),
                'stand_name'    => $exhibitor->stands->unique('area_id')->map(function($item) use( $exhibitor ) {
                    return $exhibitor->stands()->get()->map(function($stand) use( $item ) {
                        return ($item->area->id == $stand->area_id ? $stand->stand_name.' ('.$item->area->area_name.')' : '');
                    })->filter()->implode(', ');
                })->implode(', '),
                // 'categories'   => $exhibitor->company->categories,
                'stand'        => $exhibitor->stands,
                'area'         => $exhibitor->area
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
