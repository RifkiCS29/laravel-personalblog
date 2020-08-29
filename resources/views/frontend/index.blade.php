@extends('layouts.frontend')

@section('title')
    <title>RifkiDev.id</title>
@endsection

@section('content')
	    <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row"> 
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
				      @forelse($latest as $lat) 
                <div>
                  <a href="{{ url('/article/' . $lat->slug) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('storage/' . $lat->header_articles) }}'); ">
                    <div class="text half-to-full">
						          <span class="category mb-5">{{$lat->category->name}}</span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="{{ asset('front/images/person_rifki.jpg') }}" alt="Colorlib"> {{$lat->created_by}}</span>&bullet;
                        <span class="mr-2">{{$lat->created_at->format('d F Y')}}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> {{$lat->publish_comments->count()}}</span>
                        
                      </div>
                      <h3>{{$lat->title}}</h3>
					            <p>{!! \Str::limit($lat->content, 50, '...') !!}</p>
                    </div>
                  </a>
				        </div>
              @empty
              @endforelse
              </div>
			      </div>
          </div>
        </div>
      </section>
      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
              @forelse($articles as $row)  
                <div class="col-md-6">
                  <a href="{{ url('/article/' . $row->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="{{ asset('storage/' . $row->header_articles) }}" alt="{{ $row->title }}">
                    <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="author mr-2"><img src="{{ asset('front/images/person_rifki.jpg') }}" alt="Colorlib"> {{$row->created_by}}</span>&bullet;
                      <span class="mr-2">{{$row->category->name}}</span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> {{$row->publish_comments->count()}}</span>
                    </div>
                    <h2>{{ $row->title }}</h2>
                    </div>
                  </a>
                </div>
              @empty      
              @endforelse
              </div>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
					            <li class="page-item">{{ $articles->links() }}</li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>

            <!-- END main-content -->

            @include('layouts.frontend.module.sidebar')

          </div>
        </div>
      </section>
@endsection


