@extends('web.layouts.master')
@section('title', " Contact | TV Schedule Score")
@section('main_content')
    <h2> &nbsp; Contact </h2>
    <hr />
    <div class="row">
        <div class="col-md-6">
        @if (session()->has('flash.message'))
        <div class="alert alert-{{ session('flash.class') }} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('flash.message') }}
        </div>
      @endif
            <form style="padding-left: 15px" method="post" action="{{ route('contact_save')}}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name </label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputNAme" value="{{ old('name') }}"   placeholder="Enter Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  id="exampleInputEmail1"  placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea rows="5" name="message"  class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send</button>
              </form>
        </div>
        <div class="col-md-6"> </div>
    </div><br />
@endsection