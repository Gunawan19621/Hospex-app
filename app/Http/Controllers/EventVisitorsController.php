<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventVisitorsController extends Controller
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
        $title = 'Visitors';
        if(request()->ajax()){
            $array = [];
            $visitors = User::where('type','visitor')->orderBy('id','desc')->get();
            foreach($visitors as $visitor){
                $event_all = '';
                if($visitor->company->visitors){
                    foreach ($visitor->company->visitors as $event_visitor) {
                        if($event_all == ''){
                            $event_all = $event_visitor->event->event_title. ' - '. $event_visitor->event->year;
                        }
                        else{
                            $event_all = $event_all. ', ' . $event_visitor->event->event_title. ' - '. $event_visitor->event->year;
                        }
                    }
                }

                $array[] = [
                    'id'            => $visitor->id,
                    'company_name'  => $visitor->company->company_name,
                    'name'          => $visitor->name,
                    'email'         => $visitor->email,
                    'phone'         => $visitor->phone,
                    'email_verified_at' => $visitor->email_verified_at,
                    'created_at'    => (string) $visitor->created_at,
                    'event'         => $event_all
                ];
            }
            return datatables()->of($array)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="'.url('visitors/'.$data['id']).'"><i class="la la-edit"></i> Edit</a>  
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" > Verify</a>
                            </div>
                        </span>';
                        return $button;
                    })
                ->rawColumns(['action'])
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
        $companies = Company::orderBy('id','desc')->get();
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
            'company_name'  => 'required',
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required',
            'phone'         => 'required|numeric',
            'address'       => 'required'
        ]);

        $company = Company::create([
            'company_name' => $request->company_name,
            'company_web'  => '',
            'company_info' => '',
            'image'        => ''
        ]);

        $create = User::create([
            'company_id'  => $company->id,
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'phone'       => $request->phone,
            'address'     => $request->address,
            'type'        => 'visitor'
        ]);

        $response = $create ? '1-Visitor Saved!' : '0-Visitor Failed to Save!';
        return redirect('/visitors')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(User $visitor)
    {
        $title = 'Visitor Detail';
        return view('visitor.detail',compact('title','visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $visitor)
    {
        $title = 'Edit Visitor';
        $companies  = Company::orderBy('id','desc')->get();
        return view('visitor.edit',compact('title','visitor','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $visitor)
    {
        $request->validate([
            'company_name' => 'required',
            'name'         => 'required',
            'phone'        => 'required|numeric',
            'address'      => 'required'
        ]);

        $company = Company::where('id',$visitor->company->id)->first();
        $company->update([
            'company_name' => $request->company_name
        ]);

        if($request->password == null){
            $user = User::where('id',$visitor->id)->first();
            $user->update([
                'name'      => $request->name,
                'phone'     => $request->phone,
                'address'   => $request->address
            ]);

            $response = $user ? '1-Visitor Updated!' : '0-Visitor Failed to Update!';
            return redirect('/visitors')->with('status',$response);
        }
        else{
            $user = User::where('company_id',$company->id)->first();
            $user->update([
                'name'      => $request->name,
                'phone'     => $request->phone,
                'address'   => $request->address,
                'password'  => Hash::make($request->password)
            ]);

            $response = $user ? '1-Visitor Updated!' : '0-Visitor Failed to Update!';
            return redirect('/visitors')->with('status',$response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $visitor)
    {
        $deleteCompany = Company::destroy($visitor->company->id);
        $delete = User::destroy($visitor->id);

        $response = $delete ? '1-Visitor Deleted' : '0-Visitor Failed to Delete';
        return response()->json('1-Visitor Deleted', 200);
        //
    }

    public function verification(User $visitor)
    {
        $visitor->email_verified_at = date('Y-m-d H:i:s');
        $visitor->save();

        $response = $visitor ? '1-Visitor Verified' : '0-Visitor Failed to Verify';
        return response()->json('1-Visitor Verified', 200);
        //
    }
}
