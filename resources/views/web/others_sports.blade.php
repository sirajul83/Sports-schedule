@extends('web.layouts.master')
@section('title', "Others Sports | TV Schedule Score ")
@section('main_content')
<div class="row">
    <div class="col-md-12">
      <div class="sport-name-list">
        <ul>
            @foreach ($sports_category_list as $item)
            <li> <a href="{{ url('/sports-category')}}/{{$item->name}}"> {{$item->name}} </a> </li>
            @endforeach
        </ul>
      </div>
    </div>
</div><br />

<div class="row">

    @foreach($dates as $key => $value)
    <div class="col-md-12" > 
        <h2 style="border-bottom:1px solid #d5d2d2; text-align: center; font-size: 18px;"> <span style="background-color: black; color: #fff; padding: 2px 5px 1px 5px"> {{ date('d M', strtotime($value->play_time)) }}  </span>  &nbsp; <span style="font-size: 19px;">   {{ date('l', strtotime($value->play_time)) }}   </span> </h2>
        @foreach($event_list as $key => $item)
            @if($item->play_time == $value->play_time)
            @php  
            $team =  $item->team_name1."-Vs-".$item->team_name2;
            $title = str_replace(' ', '-', $team); @endphp
                <div class="sportTeamArea">
                    <a href="{{ url("match-details/".$item->ID."/".$title)}}">
                    <div class="sportsTime"> {{ date('H:i', strtotime($value->play_time)) }} </div>
                    <div class="sportsTeam">
                    <h3 style="font-size: 14px; font-weight: 600;"> {{$item->team_name1}} vs {{$item->team_name2}}  <br /><span style="color: #333; font-size: 12px;">{{$item->league_name}} . {{$item->sport_name}} </span>
                        </h3>  
                    </div>
                    </a>
                    <div class="sportsLink"> ESPN</div>
                </div> 
                <div style="width: 100%; height:1px; background-color: #d3d3d3; clear: both; margin-top: 5px; margin-bottom: 5px;"> </div>
            @endif
        @endforeach
    </div>

    @endforeach
    </div>
</div>
@endsection