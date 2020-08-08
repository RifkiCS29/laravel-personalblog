@extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href=#><b>Personal</b>Blog</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
  
        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            @if (session('error'))
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            </div>
            @endif
          </div>
          <div class="row">
            <div class="col-8">
                <p class="mb-1">
                    <a href="">I forgot my password</a>
                </p>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
