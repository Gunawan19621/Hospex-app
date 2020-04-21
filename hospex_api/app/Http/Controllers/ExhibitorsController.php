<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\EventExhibitor as exhibitor;

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
        $exhibitors = exhibitor::all();
        $data= [];

        foreach ($exhibitors as $key => $exhibitor) {
            
                $x['company_name']      = $exhibitor->company->company_name;
                $x['company_address']   = $exhibitor->company->company_address;
                $catgories = $exhibitor->company->categories;
                $item = '';
                foreach ($catgories as $key => $category) {
                    $item .= $category->category_name;
                    $item = $key === count($catgories)-1 ? $item.'.' : $item.', ';

                }
                
                $x['categories']        = $item;
                $data[]=$x;

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
            'company_name'          => $exhibitor->company->company_name,
            'company_address'       => $exhibitor->company->company_address,
            'company_web'           => $exhibitor->company->company_web,
            'company_email'         => $exhibitor->company->company_email,
            'company_info'          => $exhibitor->company->company_info,
            'event_title'           => $exhibitor->event->event_title
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
