<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\News;
use DB;
use DataTables;


class NewsController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image',function($row){
                        $path2 = asset('public/admin/images/news');
                        return '<img src="'.$path2.'/'.$row->image.'" style="height:200px;width:100%;border-radius: 0%;">';
                    })
                    ->addColumn('action',function($row){
                        return '<a href="'.route('news.edit',[$row->id]).'" class="btn btn-success btn-sm CategoryParimaryEdit"> Edit </a> <a href="'.route('news.delete',[$row->id]).'" class="btn btn-danger btn-sm "> Delete </a>';
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        
        return view('admin.news.news_list');
    }

    public function create()
    {
        return view("admin.news.news_create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        
         
        // news img
        if(isset($request->image)){
            $imageName = 'news_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('admin/images/news'), $imageName);
            $image = $imageName;
          }else{
            $image = "default.jpg";
          }

        $news_data = new News();

        $news_data->title             = $request->title;
        $news_data->meta_keywords     = $request->meta_keywords;
        $news_data->meta_title        = $request->meta_title;
        $news_data->meta_description  = $request->meta_description;
        $news_data->description       = $request->description;
        $news_data->date              = date('Y-m-d H:i:s', strtotime($request->date));
        // $news_data->position          = $request->position;
        $news_data->image             = $image;
        $news_data->is_active         = 1;
        $news_data->created_by        = Auth::user()->id;
        $news_data->created_ip        = request()->ip();
        $news_data->created_at        = date('Y-m-d H:i:s');

        $response = $news_data->save();
        if($response){
            return redirect()->route('news.list')->with('flash.message', 'News Added Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('news.create')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }

    public function uploadimage(Request $request){
        // if($request->hasFile('upload')){
        //     $originName = $request->file('upload')->getClientOriginalName();
        //     $fileName = pathinfo($originName , PATHINFO_FILENAME);
        //     $extension = $request->file('upload')->getClientOriginalExtension();
        //     $fileName = $fileName.'_'.time().'.'.$extension;

        //     $request->file('upload')->move(public_path('media', $fileName));
        //     $url = asset('media/'. $fileName);

        //     return response()->json(['fileName' => $fileName, 'uploded'=>1, 'url' => $url]);


        // }
        
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
         
            $request->file('upload')->move(public_path('ckimages'), $fileName);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
  }
    }

    public function edit($id)
    {
        $news_info = news::find($id);
        return view("admin.news.news_edit", compact('news_info'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
         
        // news img
        if(isset($request->image)){
            $imageName = 'news_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('admin/images/news'), $imageName);
            $image = $imageName;
          }else{
            $image = $request->pre_image;
          }

        $news_data =  news::find($id);

        $news_data->title             = $request->title;
        $news_data->meta_keywords     = $request->meta_keywords;
        $news_data->meta_title        = $request->meta_title;
        $news_data->meta_description  = $request->meta_description;
        $news_data->description       = $request->description;
        // $news_data->position          = $request->position;
        $news_data->date              =  date('Y-m-d H:i:s', strtotime($request->date));;
        $news_data->image             = $image;
        $news_data->is_active         = 1;
        $news_data->updated_by        = Auth::user()->id;
        $news_data->updated_ip        = request()->ip();
        $news_data->updated_at        = date('Y-m-d H:i:s');

        $response = $news_data->save();
        if($response){
            return redirect()->route('news.list')->with('flash.message', 'News Updated Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('news.create')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }

    public function destroy($id)
    {
        $news_data =  news::find($id);
        $delete = $news_data->delete();
        if($delete){
            return redirect()->route('news.list')->with('flash.message', 'News Delated Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('news.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
}
