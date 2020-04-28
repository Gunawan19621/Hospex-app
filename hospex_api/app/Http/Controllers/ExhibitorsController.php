<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\EventExhibitor as exhibitor;
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
        $eventId = eventId::GetEvent();
        $exhibitors = exhibitor::where('event_id', 1)->get();
        
        $data= [];

        foreach ($exhibitors as $key => $exhibitor) {
            
            $data[] = [
                'id_exhibitor'  => $exhibitor->id, 
                'nama'          => $exhibitor->company->company_name,
                'alamat'        => $exhibitor->company->company_address,
                'website'       => $exhibitor->company->company_web,
                'email'         => $exhibitor->company->company_email,
                'info'          => $exhibitor->company->company_info,
                'event_title'   => $exhibitor->event->event_title,
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
        } else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],404);
        }
        
    }
    public function show($id)
    {
        $exhibitor = exhibitor::findorfail($id);
        $data = [
            'id_exhibitor'  => $exhibitor->id, 
            'nama'          => $exhibitor->company->company_name,
            'alamat'        => $exhibitor->company->company_address,
            'website'       => $exhibitor->company->company_web,
            'email'         => $exhibitor->company->company_email,
            'info'          => $exhibitor->company->company_info,
            'event_title'   => $exhibitor->event->event_title,
            'stand'         => $exhibitor->stands()->get()->map(function($item) {
                return $item->stand_name;
            })->implode(', '),
        ];
      
        if (count($data) > 0) {
            return response()->json([
                'success'   => true,
                'message'   => 'Data Found',
                'data'      => $data
            ],200);
        } else {
            return response()->json([
                'success'   => False,
                'message'   => 'Data Not Found',
                'data'      => ''
            ],503);
        }
        
    }
}
