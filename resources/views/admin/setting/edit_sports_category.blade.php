@extends('admin.layouts.master')
@section('title', "Update Stports Category")
@section('main_content')

<div class="content-wrapper">
    <div class="row">
       <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('flash.message'))
                    <div class="alert alert-{{ session('flash.class') }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('flash.message') }}
                    </div>
                    @endif
                    <h4 class="card-title">Sports Category Update </h4>
                    <form class="form-sample" action="{{ route('setting.update_sports_cateory', $sports_category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $sports_category->name}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Position </label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="position" id="position" value="{{ $sports_category->position}}" />
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-info ml-4">Update</button>
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
   
@endsection   