@php
    use Carbon\Carbon;
    $start_date = Carbon::parse($_GET['start_date'])->translatedFormat('d F Y');
    $end_date = Carbon::parse($_GET['end_date'])->translatedFormat('d F Y');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AKTIVITAS KAS KEUANGAN WADAHNYA INDONESIA {{$start_date}} - {{$end_date}}</title>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  <style>
    @media print {
      .warna-coklat tr th {
        background-color: #c4d79b !important;
      }
    }

    body {
      font-family: 'Times New Roman' !important;
      font-size: 11pt;
    }

    .warna-coklat tr th {
      background-color: #c4d79b !important;
    }

    .judul {
      font-size: 14pt;
    }

    .judul-poin {
      font-size: 11pt;
    }

    .page-break {
      page-break-after: always;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    
    <p class="font-weight-bold judul text-center"><b>AKTIVITAS KAS KEUANGAN<br>WADAHNYA INDONESIA<br>{{ $start_date }} - {{ $end_date}}</b></p>
    <div class="row mt-5">
      <div class="col-md-12">
        <table class="table table-bordered table-striped">
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
              </tr>
              @endforeach
              <tr>
                <td colspan="8" align="right">Sisa Saldo : <b>{{ (new \App\Helpers\FormatIDHelper)->format_rupiah($balance) }}</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
  <script>
    window.print();
  </script>
</body>

</html>
