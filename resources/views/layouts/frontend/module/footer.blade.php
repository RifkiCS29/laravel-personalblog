  <footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <h3>About me</h3>
          <p class="mb-4">
            <img src="{{ asset('front/images/rifki_certificates_bfaa.png') }}" alt="Image placeholder" class="img-fluid">
          </p>

          <p>{{ $setting->bio }}<a href="{{ $setting->web_portfolio }}">Visit my Github</a></p>
        </div>
        <div class="col-md-6 ml-auto">
          <div class="row">
            <div class="col-md-7">
              <h3>Latest Post</h3>
              <div class="post-entry-sidebar">
                <ul>
                  @foreach($newest as $new)
                  <li>
                    <a href="{{ url('/article/' . $new->slug) }}">
                      <img src="{{ asset('storage/' . $new->header_articles) }}" alt="{{ $new->title }}" class="mr-4">
                      <div class="text">
                        <h4>{{$new->title}}</h4>
                        <div class="post-meta">
                          <span class="mr-2">{{$new->created_at}}</span> &bullet;
                          <span class="ml-2"><span class="fa fa-comments"></span> {{$new->comments->count()}}</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-md-1"></div>
            
            <div class="col-md-4">

              <div class="mb-5">
                <h3>Quick Links</h3>
                <ul class="list-unstyled">
                  <li><a href="{{ $setting->web_portfolio }}">About Me</a></li>
                  <li><a href="{{route('front.article')}}">Articles</a></li>
                </ul>
              </div>
              
              <div class="mb-5">
                <h3>Social</h3>
                <ul class="list-unstyled footer-social">
                  <li><a href="{{ $setting->fb }}"><span class="fa fa-facebook"></span> Facebook</a></li>
                  <li><a href="{{ $setting->twitter }}"><span class="fa fa-twitter"></span> Twitter</a></li>
                  <li><a href="{{ $setting->instagram }}"><span class="fa fa-instagram"></span> Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="small">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy; <script data-cfasync="false" src=""></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        </div>
      </div>
    </div>
  </footer>