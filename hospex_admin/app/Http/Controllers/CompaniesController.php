<?php

namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
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
        $title = 'Companies';
        if (request()->ajax()) {
            $array = [];
            $exhibitors = Company::whereHas('users', function ($query) {
                    $query->where('type','exhibitor');            
                })->orderBy('id','desc')->get();
            foreach($exhibitors as $exhibitor){
                $event_all = '';
                if($exhibitor->exhibitors){
                    foreach ($exhibitor->exhibitors as $event_exhibitor) {
                        if($event_all == ''){
                            $event_all = $event_exhibitor->event->event_title. ' - '. $event_exhibitor->event->year;
                        }
                        else{
                            $event_all = $event_all. ', ' . $event_exhibitor->event->event_title. ' - '. $event_exhibitor->event->year;
                        }
                    }
                }

                $categories = $exhibitor->categories()->select('category_name')->get();
                $items = '';
                foreach ($categories as $key => $category) {
                    $items .= ' '.$category->category_name;
                    if ($key !== $categories->count()-1) {
                        $items .= ',' ;
                    }
                }

                $array[] = [
                    'id'            => $exhibitor->id,
                    'company_name'  => $exhibitor->company_name,
                    'name'          => $exhibitor->users[0]->name,
                    'email'         => $exhibitor->users[0]->email,
                    'phone'         => $exhibitor->users[0]->phone,
                    'address'       => $exhibitor->users[0]->address,
                    'event'         => $event_all,
                    'categories'    => $items
                ];
            }

            return datatables()->of($array)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('companies/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>
                                <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                            </div>
                        </span>';
                        return $button;
                    })
                ->make(true);
        }

        return view('company.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id','desc')->get();
        $title = 'Add Company';
        return view('company.create', compact('title', 'categories'));
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
            'company_name'       => 'required',
            'company_name'       => 'required',
            'exhibitor_email'    => 'required|email|unique:users,email',
            'exhibitor_phone'    => 'required',
            'exhibitor_password' => 'required|min:6|confirmed',
            'exhibitor_password_confirmation' => 'required|min:6',
            'company_web'        => 'required',
            'exhibitor_address'  => 'required'
        ]);

        try{
            DB::transaction(function() use ($request) {
                if($request->company_info == null){
                    $request->company_info = "";
                }
                $company = Company::create([
                    'company_name'       => $request->company_name,
                    'company_web'        => $request->company_web,
                    'company_info'       => $request->company_info,
                    'image'              => ''
                ]);
                $company->categories()->attach($request->categories);

                $user = User::create([
                    'company_id' => $company->id,
                    'name'       => $request->company_name,
                    'email'      => $request->exhibitor_email,
                    'phone'      => $request->exhibitor_phone,
                    'password'   => Hash::make($request->exhibitor_password),
                    'address'    => $request->exhibitor_address,
                    'type'       => 'exhibitor'
                ]);
            });
            DB::commit();
            $response = '1-Company Saved';
        } catch (\Exception $e){
            DB::rollBack();
            dd($e);
            $response = '0-Company Failed to Save';
        }
       
        return redirect('/companies')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $title = 'Edit Company';
        $categories = Category::orderBy('id','desc')->get();

        $category_company = $company->categories;
        
        $array = [];
        foreach ($category_company as $key => $cc) {
            $array[]=$cc->pivot->category_id;
        }
        return view('company.edit', compact('title','company', 'categories','array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'company_name'       => 'required',
            'exhibitor_email'    => 'required|email|unique:users,email,'.$company->id,
            'company_web'        => 'required',
            'exhibitor_phone'    => 'required',
            'exhibitor_address'  => 'required'
        ]);

        if($request->exhibitor_password == null || $request->exhibitor_password == ''){

        }
        else{
            $request->validate([
                'exhibitor_password' => 'min:6|confirmed',
                'exhibitor_password_confirmation' => 'min:6'
            ]);
        }
        
        try{
            DB::transaction(function() use ($company, $request) {
                if($request->company_info == null){
                    $request->company_info = "";
                }

                Company::whereId($company->id)->update([
                    'company_name'       => $request->company_name,
                    'company_web'        => $request->company_web,
                    'company_info'       => $request->company_info
                ]);
    
                $company = Company::find($company->id);
                $company->categories()->sync($request->categories);

                if($request->exhibitor_password == null || $request->exhibitor_password == ''){
                    $user = User::where('company_id',$company->id)->first();
                    $user->update([
                        'name'      => $request->company_name,
                        'phone'     => $request->exhibitor_phone,
                        'address'   => $request->exhibitor_address
                    ]);
                }
                else{
                    $user = User::where('company_id',$company->id)->first();
                    $user->update([
                        'name'      => $request->company_name,
                        'phone'     => $request->exhibitor_phone,
                        'password'  => Hash::make($request->exhibitor_password),
                        'address'   => $request->exhibitor_address
                    ]);
                }
            });
            DB::commit();
            $response = '1-Company Updated';
        } catch (\Exception $e){
            DB::rollBack();
            $response = '0-Company Failed to Update';
        }
        
        return redirect('/companies')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $delete = Company::destroy($company->id);
        $response = $delete ? '1-Company Deleted' : '0-Company Failed to Delete';
        return response()->json('1-Company Deleted', 200);
        //
    }
}
