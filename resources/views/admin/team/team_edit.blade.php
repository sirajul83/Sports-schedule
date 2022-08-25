@extends('admin.layouts.master')
@section('title', "Team Edit ")
@section('main_content')

<div class="content-wrapper">
    <div class="row">
       <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Team Edit </h4>
                    <form class="form-sample" action="{{ route('team.update', $team_info->id )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sports </label>
                                    <div class="col-sm-10">
                                     <select class="form-control ml-4" name="sport_id" id="sport_id">
                                        <option value="">Sports Category</option>
                                        @foreach($sports_list as $item)
                                        <option value="{{ $item->id}}" @if($team_info->sport_id == $item->id) selected @endif>{{ $item->name}}</option>
                                        @endforeach
                                     </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> &nbsp; League Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control " name="league_id" id="league_id">
                                                <option value="">Select League Name </option>
                                                @foreach($league_list as $item)
                                                <option value="{{ $item->id}}" @if($team_info->league_id == $item->id) selected @endif>{{ $item->name}}</option>
                                                @endforeach
                                             </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Team Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $team_info->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Short Name</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="short_name" id="short_name" value="{{ $team_info->short_name}}" />
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Logo</label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="logo" id="logo" />
                                    <input type="hidden" class="form-control" name="pre_logo" id="pre_logo" value="{{ $team_info->logo}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"></label>
                                        <div class="col-sm-8">
                                            <img width="100px" height="90px" src="{{ asset('public/admin/images/team')}}/{{ $team_info->logo}}" id="imgPreview" />
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary ml-4">Update</button>
                            </div>   
                        </div>        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_script')
 <script>
    logo.onchange = evt => {
        const [file] = logo.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
 </script>   
@endsection   