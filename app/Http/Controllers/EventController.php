<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Team;
use App\Models\SportCategory;
use App\Models\LeagueCategory;
use DataTables;

class EventController extends Controller
{
    public $event_model;
	public function __construct()
	{
	    $this->middleware('auth');
        $this->event_model = new Event();
	}
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->event_model->event_list();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        return '<a href="'.route('event.edit',[$row->id]).'" class="btn btn-success btn-sm CategoryParimaryEdit"> Edit </a> <a href="'.route('event.delete',[$row->id]).'" class="btn btn-danger btn-sm "> Delete </a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.event.event_list');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports_list = SportCategory::where('is_active', 1)->get();
        $league_list = LeagueCategory::where('is_active', 1)->get();
        $team_list = Team::where('is_active', 1)->get();
        return view('admin.event.event_create', compact('sports_list','league_list','team_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sport_id' => ['required'],
            'league_id'  => ['required'],
        ]);

       $check_sport_title =  $request->check_sport_title;

        $event_data = new Event();
 
        $event_data->sport_id   = $request->sport_id;
        $event_data->league_id  = $request->league_id;
        
        if($check_sport_title !=''){
            $event_data->team_title = $request->title;
            $event_data->type = 2;
        }else{
            $event_data->team_1 = $request->team_1;
            $event_data->team_2 = $request->team_2;
            $event_data->type   = 1;
        }

        $event_data->play_time  = $request->play_time;
        $event_data->end_time   = $request->end_time;
        $event_data->description= $request->description;
        $event_data->status     = 0;
        $event_data->is_active  = 1;
        $event_data->created_by = 1;
        $event_data->created_ip = request()->ip();
        $event_data->created_at = date('Y-m-d H:i:s');


        $save = $event_data->save();

        if($save){
            return redirect()->route('event.list')->with('flash.message', 'Event Sucessfully Create!')->with('flash.class', 'success');
        }else{
            return redirect()->route('event.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }

    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event_data =  Event::find($id);
        $delete = $event_data->delete();
        if($delete){
            return redirect()->route('news.list')->with('flash.message', 'Event Delated Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('news.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }

}
