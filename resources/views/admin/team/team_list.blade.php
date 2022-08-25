@extends('admin.layouts.master')
@section('title', "Team List")
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
                <h4 class="card-title">Team List </h4>
                <div class="table-responsive">
                  <table i class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Short Name </th>
                        <th>logo</th>
                        <th>Sports </th>
                        <th>League</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach ($team_list as  $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->short_name}}</td>
                        <td><img src="{{asset('public/admin/images/team')}}/{{$item->logo}}" width="30px" height="30px" /></td>
                        <td>{{$item->sport_name}}</td>
                        <td>{{$item->league_name}}</td>
                        <td><a href="{{ route('team.edit', $item->id)}}" class="btn btn-info btn-sm">  Edit </a>
                          <a  onclick="return confirm('Are you sure you want to delete?')" href="{{ route('team.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
