@extends('web.layouts.master')
@section('title',  $event_get->team_name1." Vs ".$event_get->team_name2." | TV Schedule Score")
@section('meta_keywords', !empty($event_get->team_name1) ? $event_get->team_name1." live score, Fixtures & Results" : '')
@section('meta_title', !empty($event_get->team_name1) ? $event_get->team_name1." Vs ".$event_get->team_name2." | live score, Fixtures & Results" : '')
@section('meta_description', !empty($event_get->team_name1) ?$event_get->team_name1." Vs ".$event_get->team_name2." | live score, Fixtures & Results " : '')
@section('meta_image', url('/')."/public/web/assets/img/metaimage.jpg")
@section('main_content')
<header>
    <div class="row">
        <div class="col-md-12 matchSchedulArea"> 
            <p  style="text-align: center"> {{ date('H:i', strtotime($event_get->play_time)) }}  - {{ date('l', strtotime($event_get->play_time)) }} {{ date('d M', strtotime($event_get->play_time)) }} </p>
            <div class="teamOne"> 
                <h2>M{{$event_get->team_name1}} </h2> 
                <div class="leftLogo"> <img src="{{ asset('admin/images/team/')}}/{{ $event_get->logo1}}" alt="{{$event_get->team_name1}}" /> </div>
            
            </div>
            <div class="matchTime">
                <p>VS</p>
            </div>
            <div class="teamTwo">
                <h2> {{$event_get->team_name2}}  </h2>
                <div class="RightLogo"> <img src="{{ asset('admin/images/team/')}}/{{ $event_get->logo2}}" alt="{{$event_get->team_name2}}" /> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <p style="text-align: center"> {{$event_get->league_name}} . {{$event_get->sport_name}}  </p><br>
            <p class="match_description"> {{$event_get->description}}  </p>
    </div>
</header>
@endsection