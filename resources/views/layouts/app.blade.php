<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
  <!-- custom css -->
  @stack('customcss')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css')}}">

</head>
<body class="hold-transition skin-green">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg">Laravel Blog</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                     {{ __('Sign out') }}
                    </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                   </form>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
            <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('categories.index')}}"><i class="fa fa-adjust"></i>Categories</a></li>
            <li>
                <a href="">
                  <i class="fa fa-pencil"></i> <span>Articles</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a class="nav-link {{Request::get('status') == NULL & Request::path() == 'articles' ? 'active' : ''}}" href="{{route('articles.index')}}"><i class="fa fa-circle-o"></i>All Articles</a></li>
                  <li><a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('articles.index',['status'=>'publish'])}}"><i class="fa fa-circle-o"></i>Publish Articles</a></li>
                  <li><a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('articles.index',['status'=>'draft'])}}"><i class="fa fa-circle-o"></i>Draft Articles</a></li>
                  <li><a class="nav-link {{Request::path() == 'articles/trash' ? 'active' : ''}}" href="{{route('articles.trash')}}"><i class="fa fa-circle-o"></i>Trash Articles</a></li>
                </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-book"></i> <span>News</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="nav-link {{Request::get('status') == NULL & Request::path() == 'news' ? 'active' : ''}}" href="{{route('news.index')}}"><i class="fa fa-circle-o"></i>All News</a></li>
                <li><a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('news.index',['status'=>'publish'])}}"><i class="fa fa-circle-o"></i>Publish News</a></li>
                <li><a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('news.index',['status'=>'draft'])}}"><i class="fa fa-circle-o"></i>Draft News</a></li>
                <li><a class="nav-link {{Request::path() == 'news/trash' ? 'active' : ''}}" href="{{route('news.trash')}}"><i class="fa fa-circle-o"></i>Trash News</a></li>
              </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-book"></i> <span>Events</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="nav-link {{Request::get('status') == NULL & Request::path() == 'events' ? 'active' : ''}}" href="{{route('events.index')}}"><i class="fa fa-circle-o"></i>All Events</a></li>
                <li><a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('events.index',['status'=>'publish'])}}"><i class="fa fa-circle-o"></i>Publish Events</a></li>
                <li><a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('events.index',['status'=>'draft'])}}"><i class="fa fa-circle-o"></i>Draft Events</a></li>
                <li><a class="nav-link {{Request::path() == 'events/trash' ? 'active' : ''}}" href="{{route('events.trash')}}"><i class="fa fa-circle-o"></i>Trash Event</a></li>
              </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-book"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class="nav-link {{Request::get('status') == NULL & Request::path() == 'pages' ? 'active' : ''}}" href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i>All Pages</a></li>
                <li><a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('pages.index',['status'=>'publish'])}}"><i class="fa fa-circle-o"></i>Publish Pages</a></li>
                <li><a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('pages.index',['status'=>'draft'])}}"><i class="fa fa-circle-o"></i>Draft Pages</a></li>
                <li><a class="nav-link {{Request::path() == 'pages/trash' ? 'active' : ''}}" href="{{route('pages.trash')}}"><i class="fa fa-circle-o"></i>Trash Page</a></li>
              </ul>
            </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('page-title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
  </div>
  <!-- /.content-wrapper -->

<script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@stack('datatables')
@stack('articles_custom')
@stack('news_custom')
@stack('events_custom')
@stack('pages_custom')
<!-- SlimScroll -->
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@stack('customdatatables')
</body>
</html>