@extends('admin.layouts.master')
@section('title', 'Update News')
@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@endsection
@section('main_content')
<div class="content-wrapper">
    <div class="row">
       <div class="col-12 grid-margin">
        <div class="card ">
            @if (session()->has('flash.message'))
                <div class="alert alert-{{ session('flash.class') }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('flash.message') }}
                </div>
            @endif
           
            <!-- /.card-header -->
            <div class="card-body">
                <h3 class="card-title"> Update News </h3>
                <form method="POST" action="{{ route('news.update', $news_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-left">  Title </label>
                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $news_info->title }}" required autocomplete="title" autofocus placeholder="Title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="title" class="col-md-2 col-form-label text-md-left"> Meta Title </label>
                        <div class="col-md-10">
                            <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $news_info->meta_title }}" required autocomplete="short_title" autofocus placeholder="Meta Title">

                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="title" class="col-md-2 col-form-label text-md-left">  SEO Description </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="meta_description" value="{{ $news_info->meta_description }}"  placeholder=" SEO Description">{{ $news_info->meta_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-2  col-form-label text-md-left"> SEO Keywords </label>
                        <div class="col-md-10">
                            <input type="text"  name="meta_keywords"  id="meta_keywords" class="form-control" value="{{ $news_info->meta_keywords }}"   placeholder=" SEO Keywords" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label text-md-left"> Description </label>
                        <div class="col-md-10">
                            <textarea name="description"  id="editor" rows="4" class="form-control" placeholder="Description" required>  {{ $news_info->description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label text-md-left"> Image </label>
                        <div class="col-md-4">
                            <input type="file"  name="image"  id="newsImg" class="form-control"  />
                            <input type="hidden" class="form-control" name="pre_image" id="pre_image" value="{{ $news_info->image}}"/>
                        </div>
                        <label for="image" class="col-md-2 col-form-label text-md-right">Date </label>
                        <div class="col-md-4">
                            <input type="date"  name="date"  id="date" class="form-control" value="{{ date('Y-m-d', strtotime($news_info->date)) }}" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <img id="imgPreview" src="{{ asset('public/admin/images/news')}}/{{ $news_info->image}}" style="width: 100%; height: 140px;">
                        </div>
                       
                    </div>
                   
                    <div class="form-group row mb-0">
                        <div  class="col-md-2"></div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
           </div>
      </div>
   </div>
</div>
<!-- /.card -->
@endsection
@section('js_script')
    <script>
        newsImg.onchange = evt => {
            const [file] = newsImg.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
