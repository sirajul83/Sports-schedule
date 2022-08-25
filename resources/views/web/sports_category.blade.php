@extends('web.layouts.master')
@section('meta_keywords', $sports_category->name." Sports, live score, Fixtures & Results, Win ,TV Schedule Score")
@section('meta_title', $sports_category->name."  live score, Fixtures & Results | TV Schedule Score")
@section('meta_description', $sports_category->name." live score, Fixtures & Results | TV Schedule Score")
@section('meta_image', url('/')."/public/web/assets/img/metaimage.jpg")
@section('title', $sports_category->name." live score, Fixtures & Results | TV Schedule Score")
@section('main_content')
<div class="row">
    <div class="col-md-12">
      <div class="sport-name-list">
        <ul>
            <li> <a href="{{ url('/sports-category')}}/{{$sports_category->name}}"> {{$sports_category->name}} </a> </li>
        </ul>
      </div>
    </div>
</div><br />

<div class="row">

    @foreach($dates as $key => $value)
    <div class="col-md-12" > 
        <h2 class="sportsDate"> <span class="dayMonth"> {{ date('d M', strtotime($value->date)) }}  </span>  &nbsp; <span class="playDay">   {{ date('l', strtotime($value->date)) }}   </span> </h2>
        @foreach($event_list as $key => $item)
            @php $play_date= date('Y-m-d', strtotime($item->play_time)) ; @endphp
            @if($play_date == $value->date)
            @php  
            $team =  $item->team_name1."-Vs-".$item->team_name2;
            $title = str_replace(' ', '-', $team); @endphp
                <div class="sportTeamArea">
                    <a href="{{ url("match-details/".$item->ID."/".$title)}}">
                    <div class="sportsTime"> {{ date('H:i', strtotime($item->play_time)) }} </div>
                    <div class="sportsTeam">
                    <h3> @if($item->type == 2)  {{$item->team_title}}  @else  {{$item->team_name1}} vs {{$item->team_name2}} @endif   <br />
                        <span>{{$item->league_name}} . {{$item->sport_name}} </span>
                    </h3>  
                    </div>
                    </a>
                    <div class="sportsLink"> ESPN</div>
                </div> 
                <div class="hrHeadingbar"> </div>
            @endif
        @endforeach
    </div>
    @endforeach
    </div>
</div>
@endsection