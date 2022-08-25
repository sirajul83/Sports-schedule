<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeagueCategory;


class LeagueCategoryController extends Controller
{
    public function index()
    {
        $league_category_list = LeagueCategory::orderBy('id', 'DESC')->where('is_active', 1)->get();
        
        return view('admin.league.league_list', compact('league_category_list'));
    }
    public function create()
    {
        return view('admin.league.league_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'logo'  => ['required'],
        ]);


         // league img
         if(isset($request->logo)){
            $imageName = 'league_'.time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('admin/images/league'), $imageName);
            $image = $imageName;
          }else{
            $image = "default.jpg";
          }

        $league_category_data            = new LeagueCategory();
        $league_category_data->name       = $request->name;
        $league_category_data->short_name = $request->short_name;
        $league_category_data->logo       = $image;
        $league_category_data->is_active  = 1;
        $league_category_data->created_by = 1;
        $league_category_data->created_ip = request()->ip();
        $league_category_data->created_at = date('Y-m-d H:i:s');

        $save = $league_category_data->save();

        if($save){
            return redirect()->route('league.league_category_list')->with('flash.message', 'League Category Sucessfully Create!')->with('flash.class', 'success');
        }else{
            return redirect()->route('league.league_category_list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
    public function edit($id)
    {
        $league_info = LeagueCategory::find($id);
        
        return view('admin.league.league_edit', compact('league_info'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => ['required'],
        ]);

         // league img
         if(isset($request->logo)){
            $imageName = 'league_'.time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('admin/images/league'), $imageName);
            $image = $imageName;
          }else{
            $image = $request->pre_logo;
          }

        $league_category_data = LeagueCategory::find($id);
        $league_category_data->name       = $request->name;
        $league_category_data->short_name = $request->short_name;
        $league_category_data->logo       = $image;
        $league_category_data->is_active  = 1;
        $league_category_data->updated_by = 1;
        $league_category_data->updated_ip = request()->ip();
        $league_category_data->updated_at = date('Y-m-d H:i:s');

        $save = $league_category_data->save();

        if($save){
            return redirect()->route('league.league_category_list')->with('flash.message', 'League Category Sucessfully Updated')->with('flash.class', 'success');
        }else{
            return redirect()->route('league.league_category_list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }

    public function destroy($id)
    {
        $league_category_data = LeagueCategory::find($id);
        $response             = $league_category_data->delete();
        
        if($response){
            return redirect()->route('league.league_category_list')->with('flash.message', 'League Category Deleted Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('league.league_category_list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
}
