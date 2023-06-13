<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\SportCategory;
use App\Models\LeagueCategory;
use DB;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $team_model;
	public function __construct()
	{
	    $this->middleware('auth');
        $this->team_model = new Team();

	}
    public function index()
    {
        $team_list = $this->team_model->team_list();
        // echo "<pre>";
        // print_r($team_list);exit;
        return view('admin.team.team_list', compact('team_list'));
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
        return view('admin.team.team_create', compact('sports_list','league_list'));
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
            'name' => ['required'],
            'logo'  => ['required'],
        ]);

        // echo "sdfdf";exit;
         // logo img
         if(isset($request->logo)){
            $imageName = 'team_'.time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('admin/images/team'), $imageName);
            $image = $imageName;
          }else{
            $image = "default.jpg";
          }

        $team_data = new Team();
        $team_data->name       = $request->name;
        $team_data->short_name = $request->short_name;
        $team_data->logo       = $image;
        $team_data->sport_id   = $request->sport_id;
        $team_data->league_id  = $request->league_id;
        $team_data->is_active  = 1;
        $team_data->created_by = 1;
        $team_data->created_ip = request()->ip();
        $team_data->created_at = date('Y-m-d H:i:s');

        $save = $team_data->save();

        if($save){
            return redirect()->route('team.list')->with('flash.message', 'Team Sucessfully Create!')->with('flash.class', 'success');
        }else{
            return redirect()->route('team.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
  
    public function edit($id)
    {

        $team_info = Team::find($id);
        $sports_list = SportCategory::where('is_active', 1)->get();
        $league_list = LeagueCategory::where('is_active', 1)->get();
        
        return view('admin.team.team_edit', compact('team_info', 'sports_list', 'league_list'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'name' => ['required'],
        ]);

         // logo img
         if(isset($request->logo)){
            $imageName = 'team_'.time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('admin/images/team'), $imageName);
            $image = $imageName;
          }else{
            $image = $request->pre_logo;
          }

        $team_data =  Team::find($id);
        $team_data->name       = $request->name;
        $team_data->short_name = $request->short_name;
        $team_data->logo       = $image;
        $team_data->sport_id   = $request->sport_id;
        $team_data->league_id  = $request->league_id;
        $team_data->is_active  = 1;
        $team_data->updated_by = 1;
        $team_data->updated_ip = request()->ip();
        $team_data->updated_at = date('Y-m-d H:i:s');

        $save = $team_data->save();

        if($save){
            return redirect()->route('team.list')->with('flash.message', 'Team Sucessfully Updated!')->with('flash.class', 'success');
        }else{
            return redirect()->route('team.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
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
        $team_data = Team::find($id);
        $response  = $team_data->delete();
        
        if($response){
            return redirect()->route('team.list')->with('flash.message', 'Team Deleted Sucessfully!')->with('flash.class', 'success');
        }else{
            return redirect()->route('team.list')->with('flash.message', 'Somthing went to wrong!')->with('flash.class', 'danger');
        }
    }
    //get all league
	public function sports_league_wise_team_list(Request $request){

        $sport_id  = $request->sport_id;
        $league_id = $request->league_id;

		$response = DB::table('teams')->select('id', 'name', 'short_name')
                    ->where('league_id', '=', $league_id)
                    ->get();

		if (!empty($response)) {
            
            echo json_encode(['status' => 'success', "message" => "data found", 'data' => $response]);

        }else{

            echo json_encode(['status' => 'error', "message" => "data not found", 'data' => []]);
        }
	}
}
