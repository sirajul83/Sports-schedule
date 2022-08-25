@extends('admin.layouts.master')
@section('title', "Event Create")
@section('css')
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('public/admin/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/css/jquery.datetimepicker.css')}}">
@endsection
@section('main_content')

<div class="content-wrapper">
    <form action="{{ route('event.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Event Create</h4><br>
                <div>
                  <p class="text-right"><input class="CheckDiv" type="checkbox" name="check_sport_title" id="myCheck"> Single Sports</p>
                </div>
                <div class="form-group row ">
                  <label class="col-sm-1"> Sports</label>
                  <select class="js-example-basic-single w-100 col-sm-4 SportsCategoryAll" name="sport_id" id="sport_id">
                    <option value="AL">Select Sports Category</option>
                    @foreach($sports_list as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                  </select>
                  <label class="col-sm-3 text-right"> League</label>
                  <select class="js-example-basic-single w-100 col-sm-4 TeamSearch" name="league_id" id="league_id">
                    <option value="AL">Select </option>
                    @foreach($league_list as $item)
                      <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                  </select>
                </div><br>
                <div class="form-group row hideDiv">
                    <label class="col-sm-1"> Team 1</label>
                    <select class="js-example-basic-single w-100 col-sm-4 LeagueWiseTeam" name="team_1">
                    <option value="">Select</option>
                      
                    </select>
                    <h2 class="col-sm-2 text-center">VS </h2>
                    <label class="col-sm-1"> Team 2</label>
                    <select class="js-example-basic-single w-100 col-sm-4 LeagueWiseTeam" name="team_2" >
                      <option value="">Select</option>
                     
                    </select>
                  </div><br>
                  <div class="form-group row TitleDivShow">
                    <label class="col-sm-1"> &nbsp; &nbsp;  Title </label>
                    <input class="form-control col-sm-11" type="text"  name="title"  id="title" placeholder="Title"/>
                  </div>
                  <div class="form-group row ">
                    <label class="col-sm-2 text-right"> Start Date</label>
                    <input class="form-control col-sm-3" type="text"  name="play_time"  id="end-date"/>
                    <label class="col-sm-2 text-right"> End  Date</label>
                    {{-- <input type="datetime-local" class="form-control col-sm-3" name="end_time" /> --}}
                    <input class="form-control col-sm-3" type="text"  name="end_time"  id="end-date"/>
                  </div>
                  <div class="form-group row ">
                    <label class="col-sm-2"> &nbsp; &nbsp;  Description</label>
                    <textarea class="form-control col-sm-9" rows="8" name="description" id="description"></textarea>
                  </div>
                 
                  <div class="form-group row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success ">Submit</button>
                    </div>   
                </div>  
              </div>
            </div>
          </div>
        </div>
        </form>
       
</div>
@endsection
@section('js_script')

<script src="{{ asset('public/admin/js/jquery.datetimepicker.full.js')}}"></script>
<script src="{{ asset('public/admin/vendors/select2/select2.min.js')}}"></script>
<script src="{{ asset('public/admin/js/select2.js')}}"></script>
<script>
$(".TitleDivShow").hide();

$(document).on('click','.CheckDiv',function(){
    $(".hideDiv").show() 
    if ($(this).prop('checked')) {
         $(".hideDiv").hide();  
         $(".TitleDivShow").show();  
      }
      else {
        $(".hideDiv").show() 
        $(".TitleDivShow").hide() 
      }

 });

  /*jslint browser:true*/
  /*global jQuery, document*/

  jQuery(document).ready(function () {
      'use strict';

      jQuery('#start-date, #end-date').datetimepicker();
  });

  $(document).on('change','.TeamSearch',function(){
    $.ajaxSetup({
        
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

            let sport_id = $("#sport_id").val() || 0;
            let league_id = $("#league_id").val() || 0;
            if(sport_id == 0){
                alert('Select Sports & League')
            }
            else{
                GetTeamList(sport_id,league_id);
            }
 });

      function GetTeamList(sport_id = 0,league_id = 0){
      
          $.ajax({
              url: "{{route('sports_league.teamlist')}}",
              type: "POST",
              dataType: "JSON",
              data:{
                sport_id: sport_id,
                league_id:league_id,
              },
              success:function(response){

                if (response.status == 'success') {

                    var list = "<option value=''> Select Team </option>";

                    response.data.forEach(function(item){

                        list += "<option value='"+item.id+"'>"+item.name+"</option>";

                    });

                    $(".LeagueWiseTeam").html(list);

                }else{

                    $(".LeagueWiseTeam").html("<option value=''>Not Found</option>");
                }

                }
          });
      }
</script>
@endsection   