<?php

namespace App\Http\Controllers;

use App\Stand;
use App\EventExhibitor;
use App\Area;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;

class StandsController extends Controller
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
        $title = 'Stands';
        if(request()->ajax()){
            $array = [];
            $stands = Stand::orderBy('id','desc')->get();
            foreach($stands as $stand){
                $array[] = [
                    'id'                => $stand->id,
                    'stand_name'        => $stand->stand_name,
                    'area_name'         => $stand->area->area_name,
                    'exhibitor_name'    => $stand->exhibitor->company->company_name,
                    'event_info'        => $stand->area->event->event_title.'('.$stand->area->event->event_location.')'
                ];
                
            }
            return datatables()->of($array)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('stands/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                            </div>
                        </span>';
                        // $button .= '<a href="{{ url('events/$data->id}') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`;
                        return $button;
                    })
                ->rawColumns(['stand_name','action'])
                ->make(true);
        }
        return view('stand.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $event = null)
    {
        $title = 'Add Stand';
        $exhibitors = $event == null ? EventExhibitor::orderBy('id','desc')->get() : EventExhibitor::where('event_id', $event)->orderBy('id','desc')->get();
        $areas      = $event == null ? Area::orderBy('id','desc')->get() : Area::where('event_id', $event)->orderBy('id','desc')->get();
        $events     = $event == null ? Event::orderBy('id','desc')->get() : Event::whereId($event)->orderBy('id','desc')->get();
        $event    = $event == null ? '' : $event;
        return view('stand.create',compact('title','areas','exhibitors','events', 'event'));
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
            'stand_name'        => 'required',
            'exhibitor_id'      => 'required|numeric',
            'area_id'           => 'required|numeric'
        ]);

        $create = new Stand;
        $create->stand_name         = str_replace(",",";",$request->stand_name);
        $create->event_exhibitor_id = $request->exhibitor_id;
        $create->area_id            = $request->area_id;
        $create->save();

        $response = $create ? '1-Stand Saved!' : '0-Sponsor Failed to Save!';
        return redirect('/stands')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function show(Stand $stand)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function edit(Stand $stand)
    {
        $title = 'Edit Stand';
        $exhibitors = EventExhibitor::where('event_id',$stand->area->event->id)->orderBy('id','desc')->get();
        $areas      = Area::where('event_id',$stand->area->event->id)->orderBy('id','desc')->get();
        return view('stand.edit',compact('title','areas','exhibitors','stand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stand $stand)
    {
        $request->validate([
            'stand_name'        => 'required',
            'exhibitor_id'      => 'required|numeric',
            'area_id'           => 'required|numeric'
        ]);

        $update = Stand::where('id',$stand->id)->first();
        $update->stand_name         = str_replace(",",";",$request->stand_name);
        $update->event_exhibitor_id = $request->exhibitor_id;
        $update->area_id            = $request->area_id;
        $update->save();
        
        $response = $update ? '1-Stand Updated!' : '0-Stand Failed to Update!';
        return redirect('/stands')->with('status',$response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stand $stand)
    {
        $delete = Stand::destroy($stand->id);
        $response = $delete ? '1-Stand Deleted' : '0-Stand Failed to Delete';
        return response()->json('1-Stand Deleted', 200);
        // return redirect('/Stands')->with('status',$response);
    }

    public function select2(Request $request)
    {
        try {
            $perPage = 10;
            $page    = $request->page ?? 1;
            $term = $request->term;

            Paginator::currentPageResolver(
                function () use ($page) {
                    return $page;
                }
            );

            $area = Area::where('id',$request->area_id)->first();

            $dataDb = EventExhibitor::join('companies', 'companies.id', '=', 'event_exhibitors.company_id')->select('event_exhibitors.id','companies.company_name as text')->where('event_exhibitors.event_id', $area->event_id)->where('companies.company_name', 'LIKE', '%'.$request->term.'%')->paginate($perPage);

            return $dataDb;
        }
        catch (\Exception $exception) {
            // dd($exception->getMessage());
            return $exception->getCode();
        }
    }
}
