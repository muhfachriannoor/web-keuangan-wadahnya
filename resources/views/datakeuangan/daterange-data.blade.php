@extends('layouts/templatedashboard')
@section('cssfile')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-6">
            @php
                use Carbon\Carbon;
                $start_date = Carbon::parse($_GET['start_date'])->translatedFormat('d F Y');
                $end_date = Carbon::parse($_GET['end_date'])->translatedFormat('d F Y');
            @endphp
          <h1>Data Keuangan <b>{{ $start_date }} - {{ $end_date }}</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Keuangan</li>
          </ol>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="float-left">
            <a class="btn btn-success" href="{{ route('data-keuangan.create') }}"> Tambah Data</a>
            <a class="btn btn-success" href="/dashboard/data-keuangan/print/date-range?start_date={{$_GET['start_date']}}&end_date={{$_GET['end_date']}}" target="_blank"> Print</a>
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Saldo : <b>{{ (new \App\Helpers\FormatIDHelper)->format_rupiah($balance) }}</b></h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="{{ route('data-keuangan.date-range') }}" method="GET" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="start_date" value="{{ $_GET['start_date'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="end_date" value="{{ $_GET['end_date'] }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ session()->get('success') }}
                </div>
            @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="2%">No</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>Penanggung Jawab</th>
                    <th>PCS</th>
                    <th>Harga</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($finances as $key => $value)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->date }}</td>
                    <td>{{ $value->about }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->pcs }}</td>
                    <td>{{ (new \App\Helpers\FormatIDHelper)->format_rupiah($value->price) }}</td>
                    <td>{{ (new \App\Helpers\FormatIDHelper)->format_rupiah($value->cash_in) }}</td>
                    <td>{{ (new \App\Helpers\FormatIDHelper)->format_rupiah($value->cash_out) }}</td>
                    <td>
                        <form action="{{ url('dashboard/data-keuangan', $value->id) }}" method="POST">
                          <a class="btn btn-primary" href="{{ url('dashboard/data-keuangan/'.$value->id.'/edit') }}">Ubah</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus Data?')">Hapus</button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
@section('jsfile')
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "paging": true,
        "ordering": true
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection
