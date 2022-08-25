@extends('admin.layouts.master')
@section('title', 'News List')
@section('css')
<link rel="stylesheet" href="{{asset('public/admin/css/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/js/responsive.bootstrap4.css')}}">
@endsection
@section('main_content')
<div class="content-wrapper">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      @if (session()->has('flash.message'))
        <div class="alert alert-{{ session('flash.class') }} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('flash.message') }}
        </div>
      @endif
    
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered" id="news_table">
          <thead>
          <tr>
              <th>Sl</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Date</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody></tbody>
      </table>
        {{-- <table id="example1" class="table table-bordered table-striped table-responsive">
          <thead>
          <tr>
            <th> Sl     </th>
            <th> Title </th>
            <th> Description  </th>
            <th> Image  </th>
            <th> Date </th>
            <th> Action </th>
          </tr>
          </thead>
          <tbody>
          @php $i=1; @endphp
          @foreach ($news_info as $item)
          <tr>
            <td>{{ $i++ }}</td> 
            <td>{{$item->title}}</td>
            <td>{{$item->description}}</td>
            <td>
              <img src="{{ asset('public/admin/images/news')}}/{{$item->image}}" style="width: 100PX; height: 80px;">
            </td>
            <td>{{ date('d-m-Y', strtotime($item->date))}}</td>
            <td class="project-actions text-right">
              <a class="btn btn-info btn-sm" href="{{ route('news.edit', $item->id )}}">
                  Edit
              </a>
              <a  onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{ route('news.delete', $item->id )}}">
                  Delete
              </a>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </div>
</div>   

@endsection

@section('js_script')
<script src="{{asset('public/admin/js/datatables.min.js')}}"></script>
<script src="{{asset('public/admin/js/dataTables.responsive.min.js')}}"></script>

<script>
  $(document).ready(function(){
      let category_table = $("#news_table").DataTable({
          scrollCollapse: true,
          autoWidth: false,
          responsive: true,
          serverSide: true,
          processing: true,
          ajax:"{{route('news.list')}}",
          columns:[
              {data:'DT_RowIndex',name:'DT_RowIndex'},
              {data: 'title',name:'title'},
              {data: 'description',name:'description'},
              {data: 'image',name:'image'},
              {data: 'date',name:'date'},
              {data: 'action',name:'action'},
          ]
      });
  });

</script>

@endsection