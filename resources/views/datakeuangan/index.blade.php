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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Keuangan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Keuangan</li>
          </ol>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="float-left">
            {{-- <a class="btn btn-success" href="{{ route('kelas.create') }}"> Tambah Data</a> --}}
            <a class="btn btn-success" href="{{ route('data-keuangan.create') }}"> Tambah Data</a>
          </div>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="2%">No</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>PCS</th>
                    <th>Penanggung Jawab</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Saldo</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach ($data as $key => $value)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->tingkat_kelas->tingkat_kelas }}</td>
                      <td>{{ $value->nama_kelas }}</td>
                      <td>
                        <form action="{{ route('kelas.destroy', $value->id) }}" method="POST">
                          <a class="btn btn-primary" href="{{ route('kelas.edit', $value->id) }}">Ubah</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus Data?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach --}}
                  <tr>
                    <td>1</td>
                    <td>01 November 2024</td>
                    <td>Modal</td>
                    <td>-</td>
                    <td>Abdillah</td>
                    <td>Rp. 500.000</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{-- <form action="{{ route('kelas.destroy', $value->id) }}" method="POST"> --}}
                          {{-- <a class="btn btn-primary" href="{{ route('kelas.edit', $value->id) }}">Ubah</a> --}}
                          <a class="btn btn-primary" href="#">Ubah</a>
                          {{-- @csrf
                          @method('DELETE') --}}
                          <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus Data?')">Hapus</button>
                        {{-- </form> --}}
                      </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>01 November 2024</td>
                    <td>Pengamen</td>
                    <td>-</td>
                    <td>Abdillah</td>
                    <td>-</td>
                    <td>Rp. 1000</td>
                    <td>-</td>
                    <td>
                        {{-- <form action="{{ route('kelas.destroy', $value->id) }}" method="POST"> --}}
                          {{-- <a class="btn btn-primary" href="{{ route('kelas.edit', $value->id) }}">Ubah</a> --}}
                          <a class="btn btn-primary" href="#">Ubah</a>
                          {{-- @csrf
                          @method('DELETE') --}}
                          <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus Data?')">Hapus</button>
                        {{-- </form> --}}
                      </td>
                  </tr>
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
