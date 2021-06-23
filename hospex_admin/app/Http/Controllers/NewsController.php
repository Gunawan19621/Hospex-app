<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        $title = 'News';
        if (request()->ajax()) 
        {
            return datatables()->of(News::orderBy('id','desc')->get())
                    ->addIndexColumn()
                    ->addColumn(
                        'image',
                        function ($dataDb) {
                            if($dataDb->image == ''){
                                return '';
                            }
                            else{
                                return '<img src="'.config('url.url_media').$dataDb->image.'" height="100px">';
                            }
                        }
                    )
                    ->addColumn(
                        'content',
                        function ($dataDb) {
                            return $dataDb->content;
                        }
                    )
                    ->addColumn('action', function($data){
                            $button = '<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                                <div class="dropdown-menu dropdown-menu-right">       
                                    <a class="dropdown-item" href="'.url('news/'.$data->id.'/edit').'"><i class="la la-edit"></i> Edit</a>        
                                    <a class="dropdown-item delete" href="javascript:void(0);" data-id="'.$data->id.'" ><i class="la la-trash"></i> Hapus</a> 
                                </div>
                            </span>';
                            return $button;
                        })
                    ->rawColumns(['content','image','action'])
                    ->make(true);
            }
        return view('news.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'title'     => 'required',
            'content'   => 'required'
        ]);

        if($request->hasFile('image')){
            $file = $request->image;

            $filename = time().'_News.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $filename = 'images/'.$filename;
        }
        else{
            $filename = '';
        }

        $create = new News;
        $create->title    = $request->title;
        $create->content  = $request->content;
        $create->image    = $filename;
        $create->save();

        $response = $create ? '1-News Saved' : '0-News Failed to Save';
        return redirect('/news')->with('status', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required'
        ]);

        if($request->hasFile('image')){
            $file = $request->image;

            $filename = time().'_News.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $filename = 'images/'.$filename;
        }
        else{
            $filename = '';
        }

        $update = News::where('id', $news->id)->first();
        $update->title    = $request->title;
        $update->content  = $request->content;

        if($filename != ''){
            $update->image    = $filename;
        }
        else if($request->old_image == null){
            $update->image    = '';
        }

        $update->save();

        $response = $update ? '1-News Updated' : '0-News Failed to Update';
        return redirect('/news')->with('status', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $delete = News::destroy($news->id);
        $response = $delete ? '1-News Deleted' : '0-News Failed to Delete';
        return response()->json('1-News Deleted', 200);
        // return redirect('/news')->with('status',$response);
    }

    public function getNews()
    {
        $news['data'] = News::orderBy('id','desc')->get();
        return $news;
    }
}
