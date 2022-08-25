<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Event extends Model
{
    use HasFactory;

    public function event_list(){

        $event_query = DB::table("events AS EVN")
                     ->select('EVN.*', 'SPC.name as sport_name','LEC.name as league_name','TEM1.name as team_name1','TEM2.name as team_name2')
                     ->leftJoin('sport_categories AS SPC', function($join){
                        $join->on('SPC.id', '=', 'EVN.sport_id');
                     })
                     ->leftJoin('league_categories AS LEC', function($join){
                        $join->on('LEC.id', '=', 'EVN.league_id');
                     })
                     ->leftJoin('teams AS TEM1', function($join){
                        $join->on('TEM1.id', '=', 'EVN.team_1');
                     })
                     ->leftJoin('teams AS TEM2', function($join){
                        $join->on('TEM2.id', '=', 'EVN.team_2');
                     })
                    ->where('EVN.is_active', '=',1)
                    ->orderBy('EVN.id','DESC');
        return $data = $event_query->get();

    }

    public function play_event(){

      $event_query = DB::table("events AS EVN")
                   ->select('EVN.play_time', 'EVN.id as ID','EVN.team_title','EVN.type','SPC.name as sport_name','LEC.name as league_name','TEM1.name as team_name1','TEM2.name as team_name2')
                   ->leftJoin('sport_categories AS SPC', function($join){
                      $join->on('SPC.id', '=', 'EVN.sport_id');
                   })
                   ->leftJoin('league_categories AS LEC', function($join){
                      $join->on('LEC.id', '=', 'EVN.league_id');
                   })
                   ->leftJoin('teams AS TEM1', function($join){
                      $join->on('TEM1.id', '=', 'EVN.team_1');
                   })
                   ->leftJoin('teams AS TEM2', function($join){
                      $join->on('TEM2.id', '=', 'EVN.team_2');
                   })
                  ->where('EVN.status', '!=',1)
                  ->orderBy('EVN.id','DESC');
      return $data = $event_query->get();
  }
  public function play_event_category($sport_id){

   $event_query = DB::table("events AS EVN")
                ->select('EVN.play_time', 'EVN.id as ID','EVN.team_title','EVN.type','SPC.name as sport_name','LEC.name as league_name','TEM1.name as team_name1','TEM2.name as team_name2')
                ->leftJoin('sport_categories AS SPC', function($join){
                   $join->on('SPC.id', '=', 'EVN.sport_id');
                })
                ->leftJoin('league_categories AS LEC', function($join){
                   $join->on('LEC.id', '=', 'EVN.league_id');
                })
                ->leftJoin('teams AS TEM1', function($join){
                   $join->on('TEM1.id', '=', 'EVN.team_1');
                })
                ->leftJoin('teams AS TEM2', function($join){
                   $join->on('TEM2.id', '=', 'EVN.team_2');
                })
               ->where('EVN.status', '!=',1)
               ->where('EVN.sport_id', '=', $sport_id)
               ->orderBy('EVN.id','DESC');
   return $data = $event_query->get();
}
public function play_event_date_wise($date){

   $event_query = DB::table("events AS EVN")
                ->select('EVN.play_time', 'EVN.id as ID','EVN.team_title','EVN.type','SPC.name as sport_name','LEC.name as league_name','TEM1.name as team_name1','TEM2.name as team_name2')
                ->leftJoin('sport_categories AS SPC', function($join){
                   $join->on('SPC.id', '=', 'EVN.sport_id');
                })
                ->leftJoin('league_categories AS LEC', function($join){
                   $join->on('LEC.id', '=', 'EVN.league_id');
                })
                ->leftJoin('teams AS TEM1', function($join){
                   $join->on('TEM1.id', '=', 'EVN.team_1');
                })
                ->leftJoin('teams AS TEM2', function($join){
                   $join->on('TEM2.id', '=', 'EVN.team_2');
                })
               //->where('EVN.play_time', '>=', date('Y-m-d', strtotime($date)))
               ->whereDate('EVN.play_time', '=', date('Y-m-d', strtotime($date)))

               ->orderBy('EVN.id','DESC');
   return $data = $event_query->get();
}
  public function play_event_get($id){

   $event_query = DB::table("events AS EVN")
                ->select('EVN.*', 'SPC.name as sport_name','LEC.name as league_name','TEM1.name as team_name1', 'TEM1.logo  as logo1','TEM2.name as team_name2', 'TEM2.logo  as logo2')
                ->leftJoin('sport_categories AS SPC', function($join){
                   $join->on('SPC.id', '=', 'EVN.sport_id');
                })
                ->leftJoin('league_categories AS LEC', function($join){
                   $join->on('LEC.id', '=', 'EVN.league_id');
                })
                ->leftJoin('teams AS TEM1', function($join){
                   $join->on('TEM1.id', '=', 'EVN.team_1');
                })
                ->leftJoin('teams AS TEM2', function($join){
                   $join->on('TEM2.id', '=', 'EVN.team_2');
                })
               ->where('EVN.id', '=', $id)
               ->orderBy('EVN.id','DESC');
   return $data = $event_query->first();
}
  
}
