<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportCategory;

class SportsCategoryController extends Controller
{
    public function index()
    {
        $sports_category_list = SportCategory::orderBy('position', 'ASC')->where('is_active', 1)->get();
        
        return view('admin.setting.sports_category', compact('sports_category_list'));
    }
    public function store(Request $request)
    {
        $sports_category_data = new SportCategory();
        $sports_category_data->name       = $request->name;
        $sports_category_data->position   = $request->position;
        $sports_category_data->is_active  = 1;
        $sports_category_data->created_by = 1;
        $sports_category_data->created_ip = request()->ip();
        $sports_category_data->created_at = date('Y-m-d H:i:s');

        $save = $sports_category_data->save();

        if($save){
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Sports Category Sucessfully Create!')->with('flash.class', 'success');
        }else{
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
    public function edit($id)
    {
        $sports_category = SportCategory::find($id);
        
        return view('admin.setting.edit_sports_category', compact('sports_category'));
    }

    public function update(Request $request, $id)
    {
        $sports_category_data = SportCategory::find($id);
        $sports_category_data->name       = $request->name;
        $sports_category_data->position   = $request->position;
        $sports_category_data->is_active  = 1;
        $sports_category_data->created_by = 1;
        $sports_category_data->created_ip = request()->ip();
        $sports_category_data->created_at = date('Y-m-d H:i:s');

        $save = $sports_category_data->save();

        if($save){
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Sports Category Sucessfully Updated')->with('flash.class', 'success');
        }else{
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }

    public function destroy($id)
    {
        $sports_category_data = SportCategory::find($id);
        $response             = $sports_category_data->delete();
        
        if($response){
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Sports Category Deleted Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('setting.sports_cateory')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }


}
