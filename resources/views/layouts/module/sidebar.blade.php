  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{Request::path() == 'home' ? 'active' : ''}}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">MANAJEMEN WEBSITE</li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link {{Request::path() == 'categories' ? 'active' : ''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Articles
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == NULL & Request::path() == 'articles' ? 'active' : ''}}" href="{{route('articles.index')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Articles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('articles.index',['status'=>'publish'])}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Publish Articles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('articles.index',['status'=>'draft'])}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Draft Articles</p>
                    </a>
                  </li>
            </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route('comments.index') }}" class="nav-link {{Request::path() == 'comments' ? 'active' : ''}}">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Comments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('settings.index') }}" class="nav-link {{Request::path() == 'settings' ? 'active' : ''}}">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>Settings</p>
              </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container -->