  <div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box">
      <div class="bio text-center">
        <img src="{{ asset('front/images/person_rifki.jpg') }}" alt="Image Placeholder" class="img-fluid">
        <div class="bio-body">
          <h2>{{ $setting->owner }}</h2>
           <p>{{ $setting->bio }}</p>
          <p><a href="{{ $setting->web_portfolio }}" class="btn btn-primary btn-sm rounded">My Portfolio</a></p>
          <p class="social">
            <a href="{{ $setting->fb }}" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="{{ $setting->twitter }}" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="{{ $setting->instagram }}" class="p-2"><span class="fa fa-instagram"></span></a>
          </p>
        </div>
      </div>
    </div>
    <!-- END sidebar-box -->  
    <div class="sidebar-box">
      <h3 class="heading">Related Posts</h3>
      <div class="post-entry-sidebar">
        <ul>
          @foreach($random as $rand)
          <li>
            <a href="{{ url('/article/' . $rand->slug) }}">
              <img src="{{ asset('storage/' . $rand->header_articles) }}" alt="{{ $rand->title }}" class="mr-4">
              <div class="text">
                <h4>{{$rand->title}}</h4>
                <div class="post-meta">
                  <span class="mr-2">{{$rand->created_at}} </span>
                </div>
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
      <h3 class="heading">Categories</h3>
      <ul class="categories">
          @foreach($categories as $cat)  
              <li><a href="{{ url('/category/' . $cat->slug) }}">{{$cat->name}}<span>{{$cat->article->count()}}</span></a></li>
          @endforeach
      </ul>
    </div>
    <!-- END sidebar-box -->
  </div>
  <!-- END sidebar -->