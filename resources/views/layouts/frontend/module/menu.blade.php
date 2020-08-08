<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link {{Request::path() == '/' ? 'active' : ''}}" href="{{ route('front.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::path() == 'article' ? 'active' : ''}}" href="{{ route('front.article') }}">Articles</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              @foreach($categories as $cat)  
                <a class="dropdown-item {{Request::path() == 'category/'. $cat->slug ? 'active' : ''}}" href="{{ url('/category/' . $cat->slug) }}">{{$cat->name}}</a>
              @endforeach
            </div>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>