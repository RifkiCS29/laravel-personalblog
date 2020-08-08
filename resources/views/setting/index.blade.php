@extends('layouts.admin')

@section('title')
    <title>Edit Setting</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Setting</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Setting</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Setting</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <form action="{{ route('settings.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="owner">Owner</label>
                                    <input type="text" name="owner" class="form-control" value="{{ $setting->owner }}">
                                    <p class="text-danger">{{ $errors->first('owner') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="bio">bio</label>
                                    <textarea name="bio" cols="30" rows="4" class="form-control">{{ $setting->bio }}</textarea>
                                    <p class="text-danger">{{ $errors->first('bio') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="web_portfolio">Github Page</label>
                                    <input type="text" name="web_portfolio" class="form-control" value="{{ $setting->web_portfolio }}">
                                    <p class="text-danger">{{ $errors->first('web_portfolio') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="fb">Link Facebook</label>
                                    <input type="text" name="fb" class="form-control" value="{{ $setting->fb }}">
                                    <p class="text-danger">{{ $errors->first('fb') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Link Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                                    <p class="text-danger">{{ $errors->first('twitter') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Link Instagram</label>
                                    <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}">
                                    <p class="text-danger">{{ $errors->first('instagram') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection