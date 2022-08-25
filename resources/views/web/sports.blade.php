@extends('web.layouts.master')
@section('meta_keywords', "Sports, live score, Fixtures & Results, Win ,TV Schedule Score")
@section('meta_title', "TV Schedule Score , live score, Fixtures & Results , Result , Time , Match , Win")
@section('meta_description', "Sports | TV Schedule Score")
@section('meta_image', url('/')."/public/web/assets/img/metaimage.jpg")
@section('title', "Sports | TV Schedule Score")
@section('main_content')
<div class="row">
    <div class="col-md-12">
      <div class="sport-name-list">
        <ul>
            @foreach ($sports_category_list as $item)
            <li> <a href="{{ url('/sports-category')}}/{{$item->name}}"> {{$item->name}} </a> </li>
            @endforeach
            <li> <a href="{{ url('/others-sports')}}"> Others </a> </li>
        </ul>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action=" {{ route('sports.date_wise_search')}}">
            @csrf
        <div class="sports_date_serch_wrapper">
            <div class="date_search_left">
                <div class="sport-date-list">
                    <ul>
                        <li> 
                            <a href="{{ url('/sports-date')}}/{{ date('Y-m-d', strtotime(' -1 day'))}}"> {{ date('d', strtotime(' -1 day'))}} <br /> {{ date('D', strtotime(' -1 day'))}} </a>
                        </li>
                        <li> 
                            <a href="{{ url('/sports-date')}}/{{ date('Y-m-d')}}"> {{date('d')}}  <br /> {{ date('D')}} </a>
                        </li>
                        <li> 
                            <a href="{{ url('/sports-date')}}/{{ date('Y-m-d', strtotime(' +1 day'))}}"> {{date('d', strtotime(' +1 day'))}}  <br /> {{ date('D', strtotime(' +1 day'))}} </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="date_search_center">
                <input type="date" name="sports_date" class="form-control searchInput" />
            </div>
            <div class="date_search_right">
                <input type="submit" class=" btn btn-success form-control searchButton" value="Search" />
            </div>
        </div>
        </form>
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