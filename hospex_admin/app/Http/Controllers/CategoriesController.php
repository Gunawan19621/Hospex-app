<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $title = 'Categories';
        if (request()->ajax()) 
        {
            return datatables()->of(Category::where('id','desc'))
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('categories/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                    <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data->id.'" ><i class="la la-trash"></i> Hapus</a> 
                                </div>
                            </span>';
                            return $button;
                        })
                    ->rawColumns(['category_name','action'])
                    ->make(true);
            }
        return view('category.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'category_name'     => 'required',]);
        $create=Category::create($request->all());
        $response = $create ? '1-Category Saved' : '0-Category Failed to Save';
        return redirect('/categories')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([ 'category_name'     => 'required',]);
        $update = Category::where('id', $category->id)
                ->update([
                    'category_name'       => $request->category_name,
                ]);
        $response = $update ? '1-Category Updated' : '0-Category Failed to Update';
        return redirect('/categories')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = Category::destroy($category->id);
        $response = $delete ? '1-Category Deleted' : '0-Category Failed to Delete';
        return response()->json('1-Category Deleted', 200);
        // return redirect('/categories')->with('status',$response);
    }

    public function getCategories()
    {
        $categories['data'] = Category::where('id','desc')->get();
        return $categories;
    }
}
