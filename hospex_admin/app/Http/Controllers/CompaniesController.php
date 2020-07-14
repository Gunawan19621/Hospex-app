<?php

namespace App\Http\Controllers;

use App\Company;
use App\Category;
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
            return datatables()->of(Company::all())
                ->addIndexColumn()
                ->addColumn('categories', function($data){
                    $categories = $data->categories()->select('category_name')->get();
                    $items = '';
                    foreach ($categories as $key => $category) {
                        $items .= ' '.$category->category_name;
                        if ($key !== $categories->count()-1) {
                            $items .= ',' ;
                        }
                    }
                    return $items;
                })
                ->addColumn('action', function($data){
                        $button = '<span class="dropdown">
                        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                            <div class="dropdown-menu dropdown-menu-right">       
                                <a class="dropdown-item" href="'.url('companies/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                <a class="dropdown-item" href="#"><i class="la la-trash"></i> Hapus</a>        
                            </div>
                        </span>';
                        $button .= '<a href="'.url('companies/'.$data->id.'').'" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>';
                        return $button;
                    })
                ->rawColumns(['action'])
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
        $categories = Category::all();
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
            'company_email'      => 'required',
            'company_web'        => 'required',
            'company_address'    => 'required',
            // 'company_info'       => 'required',
        ]);
        try{
            
            DB::transaction(function() use ($request) {
                
                $company = Company::create([
                    'company_name'       => $request->company_name,
                    'company_email'      => $request->company_email,
                    'company_web'        => $request->company_web,
                    'company_address'    => $request->company_address,
                    'company_info'       => $request->company_info,
                    // 'logo'               => ''
                ]);
                $company->categories()->attach($request->categories);
            });
            DB::commit();
            $response = '1-Company Saved';
        } catch (\Exception $e){
            DB::rollBack();
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
        $categories = Category::all();

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
            'company_name'      => 'required',
            'company_email'     => 'required|E-mail',
            'company_web'       => 'required',
            'company_address'   => 'required',
            'categories'        => 'distinct'
        ]);
        try{
            
            DB::transaction(function() use ($company, $request) {
    
                Company::whereId($company->id)
                    ->update([
                        'company_name'       => $request->company_name,
                        'company_email'      => $request->company_email,
                        'company_web'        => $request->company_web,
                        'company_address'    => $request->company_address,
                    ]);
    
                $company = Company::find($company->id);
                $company->categories()->sync($request->categories);
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
        //
    }
}
