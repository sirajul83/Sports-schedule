@extends('admin.layouts.master')
@section('title', 'Add News')
@section('css')

{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}


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
                <h3 class="card-title"> Add News </h3>
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-left">  Title </label>
                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="title" class="col-md-2 col-form-label text-md-left">  SEO Title </label>
                        <div class="col-md-10">
                            <input id="metatitle" type="text" class="form-control @error('title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}" required autocomplete="meta_title" autofocus placeholder="SEO Title">

                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="title" class="col-md-2 col-form-label text-md-left">  SEO Description </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="meta_description"  placeholder=" SEO Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-2  col-form-label text-md-left"> SEO Keywords </label>
                        <div class="col-md-10">
                            <input type="text"  name="meta_keywords"  id="meta_keywords" class="form-control"  placeholder=" SEO Keywords" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label text-md-left"> Description </label>
                        <div class="col-md-10">
                            {{-- <textarea name="description"  id="editor" rows="8" class="form-control" placeholder="Description" required>  </textarea> --}}
                            <textarea class="form-control" id="summary-ckeditor" name="description"></textarea> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id=""></div>

                    </div>
                    
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label text-md-left"> Image </label>
                        <div class="col-md-4">
                            <input type="file"  name="image"  id="newsImg" class="form-control"  />
                        </div>
                        <label for="image" class="col-md-2 col-form-label text-md-right">Date </label>
                        <div class="col-md-4">
                            <input type="date"  name="date"  id="date" value="{{ date('Y-m-d')}}" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <img id="imgPreview" src="" style="width: 100%; height: 140px;">
                        </div>
                       
                    </div>
                   
                    <div class="form-group row mb-0">
                        <div  class="col-md-2"></div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success">
                                Submit
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script> 
<script>
    newsImg.onchange = evt => {
        const [file] = newsImg.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
