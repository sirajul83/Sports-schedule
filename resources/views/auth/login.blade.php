<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Login | TV Schedule  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/vendors/ti-icons/css/themify-icons.css')}}"> 
  <link rel="stylesheet" href="{{ asset('public/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('public/admin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h2 class="text-center"> Login </h2>

              <form class="pt-2" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" id="email" name="email"  placeholder="Email" value="{{ old('email') }}">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('public/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('public/admin/js/off-canvas.js')}}"></script>
  <script src="{{ asset('public/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('public/admin/js/template.js')}}"></script>
  <script src="{{ asset('public/admin/js/settings.js')}}"></script>
  <script src="{{ asset('public/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
