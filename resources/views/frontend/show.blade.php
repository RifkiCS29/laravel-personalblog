@extends('layouts.frontend')

@section('title')
    <title>{{ $article->title }}</title>
@endsection

@section('content')
	  <section class="site-section py-lg">
		<div class="container">
		  
		  <div class="row blog-entries element-animate">
  
			<div class="col-md-12 col-lg-8 main-content">
			  <img src="{{ asset('storage/' . $article->header_articles) }}" alt="{{ $article->title }}" class="img-fluid mb-5">
			   <div class="post-meta">
					<span class="author mr-2"><img src="{{ asset('front/images/person_rifki.jpg')}}" alt="Colorlib" class="mr-2"> {{$article->created_by}}</span>&bullet;
					<span class="mr-2">{{$article->created_at->format('d F Y')}}</span> &bullet;
					<span class="ml-2"><span class="fa fa-comments"></span> {{$article->publish_comments->count()}}</span>
				</div>
			  <h1 class="mb-4">{{$article->title}}</h1>
			  <a class="category mb-5" href="{{ url('/category/' . $article->category->slug) }}">{{$article->category->name}}</a>
			 
			  <div class="post-content-body">
				<p>{!!$article->content!!}</p>
			  </div>
			  <div class="pt-5">
				<p>Categories:  <a href="{{ url('/category/' . $article->category->slug) }}">{{$article->category->name}}</a></p>
			  </div>
			  <div class="pt-5">
				<!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="{{ url('/article/' . $article->slug) }}" data-a2a-title="Rifki.dev">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_linkedin"></a>
						<a class="a2a_button_whatsapp"></a>
						<a class="a2a_button_telegram"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
			  </div>
  
			  <div class="pt-5">
			  	<h3 class="mb-5">{{$article->publish_comments->count()}} Comments</h3>
				<ul class="comment-list">
				    @foreach ($article->publish_comments as $com)
					<li class="comment">
						<div class="vcard">
							<img src="{{ asset('front/images/users.png')}}" alt="Image placeholder">
						</div>
						<div class="comment-body">
							<h3>{{ $com->username }}</h3>
							<p>{{ $com->comment }}</p>
							<p><a href="javascript:void(0)" onclick="balasKomentar({{ $com->id }}, '{{ $com->comment }}')">Reply</a></p>
						</div>
						@foreach ($com->publish_child as $val) 
						<ul class="children">
							<li class="comment">
							  <div class="vcard">
								<img src="{{ asset('front/images/users_2.png')}}" alt="Image placeholder">
							  </div>
							  <div class="comment-body">
								<h3>{{ $val->username }}</h3>
								<p>{{ $val->comment }}</p>
							  </div>
							</li>
						</ul>
						@endforeach
					</li>
					@endforeach	
				</ul>
				<!-- END comment-list -->
				
				<div class="comment-form-wrap pt-5">
				  <h3 class="mb-5">Leave a comment</h3>
					@if (session('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif
				  	<form action="{{ url('/comment') }}" method="post" class="p-5 bg-light">
						@csrf
						<input type="hidden" name="id" value="{{ $article->id }}" class="form-control">
						<input type="hidden" name="parent_id" id="parent_id" class="form-control">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" name="username">
							<p class="text-danger">{{ $errors->first('username') }}</p>
						</div>
						<div class="form-group" style="display: none" id="formReplyComment">
							<label for="">Comment Reply</label>
							<input type="text" id="replyComment" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label for="">Comment</label>
							<textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
							<p class="text-danger">{{ $errors->first('comment') }}</p>
						</div>
						<button class="btn btn-primary btn-sm">Post Comment</button>
					</form>
				  
				</div>
			  </div>
  
			</div>
  
			<!-- END main-content -->
  
            @include('layouts.frontend.module.sidebar')
			<!-- END sidebar -->
  
		  </div>
		</div>
	  </section>
  
	  <section class="py-5">
		<div class="container">
		  <div class="row">
			<div class="col-md-12">
			  <h2 class="mb-3 ">Related Posts</h2>
			</div>
		  </div>
		  <div class="row">
			@foreach($random as $rand)
			<div class="col-md-6 col-lg-4">
			  <a href="{{ url('/article/' . $rand->slug) }}" class="a-block sm d-flex align-items-center height-md" style="background-image: url('{{ asset('storage/' . $rand->header_articles) }}'); ">
				<div class="text">
				  <div class="post-meta">
					<span class="category">{{$rand->category->name}}</span>
					<span class="mr-2">{{$rand->created_at->format('d F Y')}}</span> &bullet;
					<span class="ml-2"><span class="fa fa-comments"></span> {{$rand->publish_comments->count()}}</span>
				  </div>
				  <h3>{{$rand->title}}</h3>
				</div>
			  </a>
			</div>
			@endforeach
		  </div>
		</div>
  
  
	  </section>
	  <!-- END section -->
@endsection