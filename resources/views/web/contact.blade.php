@extends('web.layouts.master')
@section('title', "Contact | TV Schedule Score")
@section('main_content')
    <h2> &nbsp; Contact </h2>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <form style="padding-left: 15px">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter Name">
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
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