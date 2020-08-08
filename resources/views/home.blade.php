@extends('layouts.admin')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
          <!-- Small boxes (Stat box) -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-globe mr-1"></i>
                        Homepage Admin
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                  <div class="inner">
                                    <h3>{{$articles->count()}}</h3>
                    
                                    <p>Artikel</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-stats-bars"></i>
                                  </div>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                  <div class="inner">
                                    <h3>{{$categories->count()}}</h3>
                    
                                    <p>Kategori</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-stats-bars"></i>
                                  </div>
                                </div>
                              </div>
                              <!-- ./col -->
                              <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                  <div class="inner">
                                    <h3>{{$comments->count()}}</h3>
                    
                                    <p>Komentar</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                  </div>
                                </div>
                              </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection
