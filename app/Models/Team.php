<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Team extends Model
{
    use HasFactory;

    public function team_list(){

        $team_query = DB::table("teams AS TEM")
                     ->select('TEM.*', 'SPC.name as sport_name','LEC.name as league_name')
                     ->leftJoin('sport_categories AS SPC', function($join){
                        $join->on('SPC.id', '=', 'TEM.sport_id');
                     })
                     ->leftJoin('league_categories AS LEC', function($join){
                        $join->on('LEC.id', '=', 'TEM.league_id');
                     })
                    ->where('TEM.is_active', '=',1)
                    ->orderBy('TEM.id','DESC');
        return $data = $team_query->get();

    }
}
