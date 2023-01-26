<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex, follow"/>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="tvschedulescore">
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="@yield('meta_title')">
    <meta itemprop="description" content="@yield('meta_description')">
    <meta name="twitter:image" content="@yield('meta_image')">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="tvschedulescore">
    <meta name="twitter:site" content="tvschedulescore.com">
    <meta name="twitter:title" content="@yield('meta_title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:creator" content="tvschedulescore">

    <!-- Facebook seo data -->
    <meta property="og:title" content="@yield('meta_title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:site_name" content="tvschedulescore"/>
    
    <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('')}}public/web/assets/img/favicon.png" />
    <link href="{{ url()->current() }}" rel="canonical" />

    <link rel="stylesheet" href="{{ asset('web/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('web/aseets/css/customs.css')}}">
    @yield('css')
    <title> @yield('title') </title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3SZNBWF9KC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3SZNBWF9KC');
    </script>
  </head>
  <meta name="google-site-verification" content="opMDE6432fzT7eZbaeEX8366Ek3JPj8UlwfOwxOifbI" />
  <body>
      <div class="container wrapper">
          @include('web.layouts.header')
      
          <div class="mainContentArea">
            @yield('main_content')
          </div>
      </div>
      @include('web.layouts.footer')
    
    <script src="{{ asset('web/assets/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('web/assets/js/customs.js')}}"></script>
    @yield('js')
  </body>
</html>