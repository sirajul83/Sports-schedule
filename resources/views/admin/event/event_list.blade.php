@extends('admin.layouts.master')
@section('title', "Event List")
@section('css')
<link rel="stylesheet" href="{{asset('public/admin/css/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/js/responsive.bootstrap4.css')}}">
@endsection
@section('main_content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
                @if (session()->has('flash.message'))
                <div class="alert alert-{{ session('flash.class') }} alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ session('flash.message') }}
                </div>
                @endif
              <div class="card-body">
                <h4 class="card-title">Event List </h4>
                <div class="table-responsive">
                  <table class="table table-bordered" id="events_table">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Sports</th>
                        <th>League </th>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Team title </th>
                        <th>Date </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @php $i=1; @endphp
                      @foreach ($event_list as  $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->sport_name}}</td>
                        <td>{{$item->league_name}}</td>
                        <td>{{$item->team_name1}}</td>
                        <td>{{$item->team_name2}}</td>
                        <td>{{$item->play_time}}</td>
                        <td><a href="{{ route('event.edit', $item->id)}}" class="btn btn-info btn-sm">  Edit </a>
                          <a  onclick="return confirm('Are you sure you want to delete?')" href="{{ route('event.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>

                      @endforeach --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
@section('js_script')
<script src="{{asset('public/admin/js/datatables.min.js')}}"></script>
<script src="{{asset('public/admin/js/dataTables.responsive.min.js')}}"></script>

<script>
  $(document).ready(function(){
      let category_table = $("#events_table").DataTable({
          scrollCollapse: true,
          autoWidth: false,
          responsive: true,
          serverSide: true,
          processing: true,
          ajax:"{{route('event.list')}}",
          columns:[
              {data:'DT_RowIndex',name:'DT_RowIndex'},
              {data: 'sport_name',name:'sport_name'},
              {data: 'league_name',name:'league_name'},
              {data: 'team_name1',name:'team_name1'},
              {data: 'team_name2',name:'team_name2'},
              {data: 'team_title',name:'team_title'},
              {data: 'play_time',name:'play_time'},
              {data: 'action',name:'action'},
          ]
      });
  });

</script>

@endsection