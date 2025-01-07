@extends('layouts/templatedashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      {{-- @if (auth()->user()->level == 1 or auth()->user()->level == 2) --}}
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                {{-- <h3>{{ $hitung_tahunAjaran }}</h3> --}}
                <h3>{{ $countDataKeuangan }}</h3>
                <p>Data Keuangan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              {{-- <a href="{{ route('tahun-ajaran.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a> --}}
                <a href="{{ route('data-keuangan.index') }}" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                {{-- <h3>{{ $hitung_kelas }}</h3> --}}
                <h3>{{ $countDataAkun }}</h3>
                <p>Data Akun</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              {{-- <a href="{{ route('kelas.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a> --}}
                <a href="{{ route('data-akun.index') }}" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      {{-- @endif --}}
    </div>
  </section>
  <!-- /.content -->
@endsection
