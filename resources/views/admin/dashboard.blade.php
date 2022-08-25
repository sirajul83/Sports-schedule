@extends('admin.layouts.master')
@section('title', "Dashboard | Admin")
@section('main_content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome to Dashboard</h3>
            
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin transparent">
          <div class="row">
            <div class="col-md-4 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <h3 class="mb-4">Today Event </h3>
                  <p class="fs-30 mb-2">406</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <h3 class="mb-4">Total Event</h3>
                  <p class="fs-30 mb-2">61344</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <h3 class="mb-4"> Total Team</h3>
                    <p class="fs-30 mb-2">644</p>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <h3 class="mb-4">Total League</h3>
                  <p class="fs-30 mb-2">40</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <h3 class="mb-4">Total Sports  </h3>
                  <p class="fs-30 mb-2">47033</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection    