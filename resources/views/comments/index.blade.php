@extends('layouts.admin')

@section('title')
    <title>List Comments</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Comments</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Comments List</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Comments List</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Komentar</th>
                                            <th>Artikel</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($comments as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $row->username}}</td>
                                            <td>{{ $row->comment }}</td>
                                            <td>{{ $row->article->title }}</td>
                                            <td>{!! $row->status_label !!}</td>
                                            <td>
                                                @if($row->status == 'DRAFT')
                                                <form action="{{ route('comments.publish', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-info btn-sm">Publish</button>
                                                </form>
                                                @else
                                                    <button class="btn btn-info btn-sm disabled">Publish</button>
                                                @endif
                                                <form onsubmit="return confirm('Yakin Hapus Komentar ?')" action="{{ route('comments.delete', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $comments->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection