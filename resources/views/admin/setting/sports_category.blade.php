@extends('admin.layouts.master')
@section('title', "Stports Category")
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
                    <h4 class="card-title">Sports Category Create </h4>
                    <form class="form-sample" action="{{ route('setting.store_sports_cateory')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Position </label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" name="position" id="position" />
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success ml-4">Submit</button>
                            </div>   
                        </div>        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card ">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sports Category List </h4>
                <div class="table-responsive">
                  <table i class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach ($sports_category_list as  $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        <td><span class="badge badge-warning"> {{$item->position}} <span></td>
                        <td><a href="{{ route('setting.edit_sports_cateory',$item->id)}}" class="btn btn-info btn-sm">  Edit </a>
                            <a  onclick="return confirm('Are you sure you want to delete?')" href="{{ route('setting.delete_sports_cateory',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
@section('js_script')
   
@endsection   