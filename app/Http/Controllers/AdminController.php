<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
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
        $title = 'Admin';
        if (request()->ajax()) {
            return datatables()->of(Admin::orderBy('id','desc'))
                ->addIndexColumn()
                ->addColumn('action', function($data){
                        if(Auth::user()->id == $data['id']){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('admin/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>
                                </div>
                            </span>';
                        }
                        else{
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('admin/'.$data['id'].'/edit').'"><i class="la la-edit"></i> Edit</a>
                                    <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data['id'].'" ><i class="la la-trash"></i> Hapus</a>
                                </div>
                            </span>';
                        }
                        
                        return $button;
                    })
                ->make(true);
        }

        return view('admin.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Admin';
        return view('admin.create', compact('title'));
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
            'name'                  => 'required',
            'email'                 => 'required|email|unique:admins,email',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        try{
            DB::transaction(function() use ($request) {
                $admin = Admin::create([
                    'name'       => $request->name,
                    'email'      => $request->email,
                    'password'   => Hash::make($request->password)
                ]);
            });
            DB::commit();
            $response = '1-Admin Saved';
        } catch (\Exception $e){
            DB::rollBack();
            dd($e);
            $response = '0-Admin Failed to Save';
        }
       
        return redirect('/admin')->with('status',$response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return $admin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $title = 'Edit Admin';

        return view('admin.edit', compact('title','admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:admins,email,'.$admin->id
        ]);

        if($request->password == null || $request->password == ''){

        }
        else{
            $request->validate([
                'password'              => 'min:6|confirmed',
                'password_confirmation' => 'min:6'
            ]);
        }
        
        try{
            DB::transaction(function() use ($admin, $request) {
                $admin = Admin::where('id',$admin->id)->first();
                $admin->name  = $request->name;
                $admin->email = $request->email;

                if($request->password == null || $request->password == ''){

                }
                else{
                    $admin->password = Hash::make($request->password);
                }

                $admin->save();
            });
            DB::commit();
            $response = '1-Admin Updated';
        } catch (\Exception $e){
            DB::rollBack();
            $response = '0-Admin Failed to Update';
        }
        
        return redirect('/admin')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $delete = Admin::destroy($admin->id);
        $response = $delete ? '1-Admin Deleted' : '0-Admin Failed to Delete';
        return response()->json('1-Admin Deleted', 200);
        //
    }
}
