<!doctype html>
<html lang="en">
  <head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="shortcut icon" href="{{asset('img/rifkidev.ico')}}">
  </head>
  <body>
    

    <div class="wrap">

      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="{{ $setting->fb }}"><span class="fa fa-facebook"></span></a>
                <a href="{{ $setting->twitter }}"><span class="fa fa-twitter"></span></a>
                <a href="{{ $setting->instagram }}"><span class="fa fa-instagram"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="{{ route('front.article') }}" method="get" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" name="q" placeholder="Type keyword to search..." value="{{Request::get('q')}}">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="{{route('front.index')}}">RifkiDev.id</a></h1>
            </div>
          </div>
        </div>
        
		@include('layouts.frontend.module.menu')
		
      </header>
      <!-- END header -->

	  @yield('content')

    @include('layouts.frontend.module.footer')
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>

    
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script>
      function balasKomentar(id, title) {
          $('#formReplyComment').show();
          $('#parent_id').val(id)
          $('#replyComment').val(title)
      }
    </script>
  </body>
</html>